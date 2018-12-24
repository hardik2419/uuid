import { Component, OnInit ,Input } from '@angular/core';
import { Router } from '@angular/router';

@Component({
    selector: 'app-breadcrumb',
    templateUrl: './breadcrumb.component.html',
    styleUrls: ['./breadcrumb.component.scss']
})
export class BreadcrumbComponent implements OnInit {
    @Input() pagelink: any;
    constructor(
        public router: Router,
    ) {}
    ngOnInit() {

    }
}