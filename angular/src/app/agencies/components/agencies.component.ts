import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
@Component({
    selector: 'app-agencies',
    templateUrl: './agencies.component.html',
    styleUrls: ['./agencies.component.scss'],
})
export class AgenciesComponent implements OnInit {
    breadcrumbs = {
        pagetitle : 'User Account',
        link: 'user-account'
    };
    agencs:any = [];
    constructor(
        private router: Router,
        private http: HttpClient,

        ) {
        this.agencs = [
            {
                title:'Deksia',
                image:'company_logo2.jpg',
            },
            {
                title:'Brand Tuitive',
                image:'company_logo1.jpg',
            },
            {
                title:'Spire Agency',
                image:'company_logo4.jpg',
            },
            {
                title:'Pure Fusion Media',
                image:'company_logo3.jpg',
            },
        ]
    }
    ngOnInit() {

    }
}
