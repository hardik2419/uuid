import { Pipe, PipeTransform } from '@angular/core';
import { environment } from '../../../environments/environment';

@Pipe({name: 'assetspath'})
export class AssetsPath implements PipeTransform {
  transform(value: any) {
    if (value != undefined && value != null) {
      const baseUrl = environment.baseUrl;
      value = value.replace(/^\s+/, "");
      return 'assets/images/'+value;
    }
  }
}