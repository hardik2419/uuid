<?php

namespace App\Traits;

trait FileUploadTrait
{
    protected $file_meta_data_attributes = [];
    protected $file_attribute_name       = "";
    protected $upload_disk;

    public function getTypeAttribute()
    {
        if (isset($this->attributes[$this->file_attribute_name])) {
            $path = $this->attributes[$this->file_attribute_name];
            return pathinfo($path, PATHINFO_EXTENSION);
        } else {
            return "";
        }
    }

    public function getFileUrl($file_path)
    {

        $disk = \Config::get('filesystems.default');

        $tmp       = explode('.', $file_path);
        $extension = end($tmp);

        $name             = basename($file_path, "." . $extension);
        $destination_path = dirname($file_path) . "/";

        try {
            return $this->getDiskUrl($file_path);
        } catch (\InvalidArgumentException $e) {
            return "";
        }
    }

    public function saveFile($value, $attribute_name = "image", $destination_path = "", $disk = "")
    {
        $this->file_attribute_name = $attribute_name;

        if (empty($disk)) {
            $this->upload_disk = $disk = \Config::get('filesystems.default');
        } else {
            $this->upload_disk = $disk;
        }

        $this->removeFile();
        if ($value == null) {
            return false;
        }

        $this->saveFileMetaData($value);

        if (starts_with($value, 'data:')) {
            $filename = str_slug(Config('app.name')) . "-" . md5($value . time());
            $fileext  = "." . $this->base64ToExt($value);

            if (starts_with($value, 'data:image')) {
                $image       = \Image::make($value);
                $file_stream = $image->stream()->getContents();
            } else {
                $base64_str  = substr($value, strpos($value, ",") + 1);
                $file_stream = base64_decode($base64_str);
            }

            $this->storeFileInDisk($value, $destination_path . '/' . $filename . $fileext);
            $this->attributes[$this->file_attribute_name] = $destination_path . '/' . $filename . $fileext;
            return true;
        } elseif (starts_with($value, 'http')) {
            if (strpos($value, '?') !== false) {
                $url = explode('?', $value);
                $url = $url[0];
            } else {
                $url = $value;
            }
            $url_arr  = explode('.', $url);
            $ct       = count($url_arr);
            $filename = str_slug(Config('app.name')) . "-" . md5($value . time());
            $contents = file_get_contents($value);

            $finfo   = new \finfo(FILEINFO_MIME_TYPE);
            $mime    = $finfo->buffer($contents);
            $fileext = $this->mimeToExt($mime);

            if (!$fileext) {
                $fileext = "." . $url_arr[$ct - 1];
            } else {
                $fileext = "." . $fileext;
            }
            $this->storeFileInDisk($value, $destination_path . '/' . $filename . $fileext);
            $this->attributes[$this->file_attribute_name] = $destination_path . '/' . $filename . $fileext;
            return true;
        } elseif (is_object($value)) {
            $name      = $value->getClientOriginalName();
            $temp_name = $value->getPathName();

            $filename = str_slug(Config('app.name')) . "-" . md5($name . time());
            $fileext  = '.' . $value->getClientOriginalExtension();

            $this->storeFileInDisk($value, $destination_path . '/' . $filename . $fileext);
            $this->attributes[$this->file_attribute_name] = $destination_path . '/' . $filename . $fileext;
            return true;
        } elseif (!empty($value) && is_string($value)) {
            $this->attributes[$this->file_attribute_name] = $value;
            return true;
        } else {
            return false;
        }
    }

    private function storeFileInDisk($value, $destination_path)
    {
        $disk       = \Config::get('filesystems.default');
        $path_parts = pathinfo($destination_path);

        if (starts_with($value, 'data:')) {
            if (starts_with($value, 'data:image')) {
                $image       = \Image::make($value);
                $file_stream = $image->stream()->getContents();
            } else {
                $base64_str  = substr($value, strpos($value, ",") + 1);
                $file_stream = base64_decode($base64_str);
            }
            \Storage::disk($disk)->put($destination_path, $file_stream);
            return true;
        } elseif (starts_with($value, 'http')) {
            $contents = file_get_contents($value);
            \Storage::disk($disk)->put($destination_path, $contents);
            return true;
        } elseif (is_object($value)) {
            $filename = $path_parts['filename'] . "." . $path_parts['extension'];
            $value->storeAs($path_parts['dirname'], $filename, $disk);

            return true;
        } elseif (!empty($value) && is_string($value)) {
            $this->attributes[$this->file_attribute_name] = $value;
        } else {
            return false;
        }
    }

    private function saveFileMetaData($file)
    {
        $default = [
            'file_type' => 'file_type',
            'file_size' => 'file_size',
            'file_name' => 'file_name',
        ];
        $attrs = $default;
        if (isset($this->file_meta_data_attributes)) {
            $attrs = array_merge($default, $this->file_meta_data_attributes);
        }

        if (\Schema::hasColumn($this->getTable(), $attrs['file_type'])) {
            if (starts_with($file, 'data:')) {
                $type                                  = explode(';', $file);
                $type                                  = explode(':', $type[0]);
                $this->attributes[$attrs['file_type']] = $type[0];
            } elseif (starts_with($file, 'http')) {
                $this->attributes[$attrs['file_type']] = getRemoteMimeType($file);
            } elseif (is_object($file)) {
                $this->attributes[$attrs['file_type']] = $file->getMimeType();
            }
        }

        if (\Schema::hasColumn($this->getTable(), $attrs['file_size'])) {
            if (starts_with($file, 'data:')) {
                $size                                  = (int) (strlen(rtrim($data, '=')) * 3 / 4);
                $this->attributes[$attrs['file_size']] = $size;
            } elseif (starts_with($file, 'http')) {
                $this->attributes[$attrs['file_size']] = remotefileSize($file);
            } elseif (is_object($file)) {
                $this->attributes[$attrs['file_size']] = $file->getSize();
            }
        }

        if (\Schema::hasColumn($this->getTable(), $attrs['file_name'])) {
            if (starts_with($file, 'data:')) {
                if (starts_with($file, 'data:image')) {
                    $orig_file_name = "Image";
                } else {
                    $orig_file_name = "File";
                }
            } elseif (starts_with($file, 'http')) {
                $name           = basename($url);
                $orig_file_name = explode('.', $name);
                $orig_file_name = ucfirst(rtrim($orig_file_name[0]));
                $orig_file_name = preg_replace('/[^A-Za-z0-9 \-\']/', '-', $orig_file_name);
                $orig_file_name = preg_replace('/[-]{2,}/', '-', $orig_file_name);
                $orig_file_name = preg_replace('/[-]/', ' ', $orig_file_name);
            } elseif (is_object($file)) {
                $name           = $file->getClientOriginalName();
                $orig_file_name = explode('.', $name);
                $orig_file_name = ucfirst(rtrim($orig_file_name[0]));
                $orig_file_name = preg_replace('/[^A-Za-z0-9 \-\']/', '-', $orig_file_name);
                $orig_file_name = preg_replace('/[-]{2,}/', '-', $orig_file_name);
                $orig_file_name = preg_replace('/[-]/', ' ', $orig_file_name);
            } else {
                $orig_file_name = "File";
            }

            $this->attributes[$attrs['file_name']] = $orig_file_name;
        }
    }

    private function base64ToExt($base64_image_string = '')
    {
        $splited = explode(',', substr($base64_image_string, 5), 2);
        $mime    = $splited[0];

        $mime_split_without_base64 = explode(';', $mime, 2);
        $mime_split                = explode('/', $mime_split_without_base64[0], 2);

        return $mime_split[1];
    }

    private function removeFile()
    {
        \Storage::disk($this->upload_disk)->delete($this->file_attribute_name);
        $this->attributes[$this->file_attribute_name] = null;
    }

    private function getDiskUrl($file_path)
    {
        if ($this->upload_disk == 's3') {
            $base_url = \Config::get("filesystems.disks.s3.cloudfront_url");
            if (!empty($base_url)) {
                return $base_url . "/" . $file_path;
            } else {
                return \Storage::disk($this->upload_disk)->url($file_path);
            }
        } else {
            return \Storage::disk($this->upload_disk)->url($file_path);
        }
    }
    public function mimeToExt($value)
    {
        $types = array(
            'application/postscript'          => 'ai',
            'audio/x-aiff'                    => 'aif',
            'audio/x-aiff'                    => 'aifc',
            'audio/x-aiff'                    => 'aiff',
            'text/plain'                      => 'asc',
            'application/atom+xml'            => 'atom',
            'application/atom+xml'            => 'atom',
            'audio/basic'                     => 'au',
            'video/x-msvideo'                 => 'avi',
            'application/x-bcpio'             => 'bcpio',
            'application/octet-stream'        => 'bin',
            'image/bmp'                       => 'bmp',
            'application/x-netcdf'            => 'cdf',
            'image/cgm'                       => 'cgm',
            'application/octet-stream'        => 'class',
            'application/x-cpio'              => 'cpio',
            'application/mac-compactpro'      => 'cpt',
            'application/x-csh'               => 'csh',
            'text/css'                        => 'css',
            'text/csv'                        => 'csv',
            'application/x-director'          => 'dcr',
            'application/x-director'          => 'dir',
            'image/vnd.djvu'                  => 'djv',
            'image/vnd.djvu'                  => 'djvu',
            'application/octet-stream'        => 'dll',
            'application/octet-stream'        => 'dmg',
            'application/octet-stream'        => 'dms',
            'application/msword'              => 'doc',
            'application/xml-dtd'             => 'dtd',
            'application/x-dvi'               => 'dvi',
            'application/x-director'          => 'dxr',
            'application/postscript'          => 'eps',
            'text/x-setext'                   => 'etx',
            'application/octet-stream'        => 'exe',
            'application/andrew-inset'        => 'ez',
            'image/gif'                       => 'gif',
            'application/srgs'                => 'gram',
            'application/srgs+xml'            => 'grxml',
            'application/x-gtar'              => 'gtar',
            'application/x-hdf'               => 'hdf',
            'application/mac-binhex40'        => 'hqx',
            'text/html'                       => 'htm',
            'text/html'                       => 'html',
            'x-conference/x-cooltalk'         => 'ice',
            'image/x-icon'                    => 'ico',
            'text/calendar'                   => 'ics',
            'image/ief'                       => 'ief',
            'text/calendar'                   => 'ifb',
            'model/iges'                      => 'iges',
            'model/iges'                      => 'igs',
            'image/jpeg'                      => 'jpe',
            'image/jpeg'                      => 'jpeg',
            'image/jpeg'                      => 'jpg',
            'application/x-javascript'        => 'js',
            'application/json'                => 'json',
            'audio/midi'                      => 'kar',
            'application/x-latex'             => 'latex',
            'application/octet-stream'        => 'lha',
            'application/octet-stream'        => 'lzh',
            'audio/x-mpegurl'                 => 'm3u',
            'application/x-troff-man'         => 'man',
            'application/mathml+xml'          => 'mathml',
            'application/x-troff-me'          => 'me',
            'model/mesh'                      => 'mesh',
            'audio/midi'                      => 'mid',
            'audio/midi'                      => 'midi',
            'application/vnd.mif'             => 'mif',
            'video/quicktime'                 => 'mov',
            'video/x-sgi-movie'               => 'movie',
            'audio/mpeg'                      => 'mp2',
            'audio/mpeg'                      => 'mp3',
            'video/mpeg'                      => 'mpe',
            'video/mpeg'                      => 'mpeg',
            'video/mpeg'                      => 'mpg',
            'audio/mpeg'                      => 'mpga',
            'application/x-troff-ms'          => 'ms',
            'model/mesh'                      => 'msh',
            'video/vnd.mpegurl'               => 'mxu',
            'application/x-netcdf'            => 'nc',
            'application/oda'                 => 'oda',
            'application/ogg'                 => 'ogg',
            'image/x-portable-bitmap'         => 'pbm',
            'chemical/x-pdb'                  => 'pdb',
            'application/pdf'                 => 'pdf',
            'image/x-portable-graymap'        => 'pgm',
            'application/x-chess-pgn'         => 'pgn',
            'image/png'                       => 'png',
            'image/x-portable-anymap'         => 'pnm',
            'image/x-portable-pixmap'         => 'ppm',
            'application/vnd.ms-powerpoint'   => 'ppt',
            'application/postscript'          => 'ps',
            'video/quicktime'                 => 'qt',
            'audio/x-pn-realaudio'            => 'ra',
            'audio/x-pn-realaudio'            => 'ram',
            'image/x-cmu-raster'              => 'ras',
            'application/rdf+xml'             => 'rdf',
            'image/x-rgb'                     => 'rgb',
            'application/vnd.rn-realmedia'    => 'rm',
            'application/x-troff'             => 'roff',
            'application/rss+xml'             => 'rss',
            'text/rtf'                        => 'rtf',
            'text/richtext'                   => 'rtx',
            'text/sgml'                       => 'sgm',
            'text/sgml'                       => 'sgml',
            'application/x-sh'                => 'sh',
            'application/x-shar'              => 'shar',
            'model/mesh'                      => 'silo',
            'application/x-stuffit'           => 'sit',
            'application/x-koan'              => 'skd',
            'application/x-koan'              => 'skm',
            'application/x-koan'              => 'skp',
            'application/x-koan'              => 'skt',
            'application/smil'                => 'smi',
            'application/smil'                => 'smil',
            'audio/basic'                     => 'snd',
            'application/octet-stream'        => 'so',
            'application/x-futuresplash'      => 'spl',
            'application/x-wais-source'       => 'src',
            'application/x-sv4cpio'           => 'sv4cpio',
            'application/x-sv4crc'            => 'sv4crc',
            'image/svg+xml'                   => 'svg',
            'image/svg+xml'                   => 'svgz',
            'application/x-shockwave-flash'   => 'swf',
            'application/x-troff'             => 't',
            'application/x-tar'               => 'tar',
            'application/x-tcl'               => 'tcl',
            'application/x-tex'               => 'tex',
            'application/x-texinfo'           => 'texi',
            'application/x-texinfo'           => 'texinfo',
            'image/tiff'                      => 'tif',
            'image/tiff'                      => 'tiff',
            'application/x-troff'             => 'tr',
            'text/tab-separated-values'       => 'tsv',
            'text/plain'                      => 'txt',
            'application/x-ustar'             => 'ustar',
            'application/x-cdlink'            => 'vcd',
            'model/vrml'                      => 'vrml',
            'application/voicexml+xml'        => 'vxml',
            'audio/x-wav'                     => 'wav',
            'image/vnd.wap.wbmp'              => 'wbmp',
            'application/vnd.wap.wbxml'       => 'wbxml',
            'text/vnd.wap.wml'                => 'wml',
            'application/vnd.wap.wmlc'        => 'wmlc',
            'text/vnd.wap.wmlscript'          => 'wmls',
            'application/vnd.wap.wmlscriptc'  => 'wmlsc',
            'model/vrml'                      => 'wrl',
            'image/x-xbitmap'                 => 'xbm',
            'application/xhtml+xml'           => 'xht',
            'application/xhtml+xml'           => 'xhtml',
            'application/vnd.ms-excel'        => 'xls',
            'application/xml'                 => 'xml',
            'image/x-xpixmap'                 => 'xpm',
            'application/xml'                 => 'xsl',
            'application/xslt+xml'            => 'xslt',
            'application/vnd.mozilla.xul+xml' => 'xul',
            'image/x-xwindowdump'             => 'xwd',
            'chemical/x-xyz'                  => 'xyz',
            'application/zip'                 => 'zip',
            'video/mp4'                       => 'mp4',
        );
        return $types[$value];
    }
}
