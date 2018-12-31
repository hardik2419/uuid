import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { PageEvent } from '@angular/material';
import { AgenciesService } from '../../shared/services/agencies.service';

@Component({
    selector: 'app-agencies',
    templateUrl: './agencies.component.html',
    styleUrls: ['./agencies.component.scss'],
})
export class AgenciesComponent implements OnInit {
    agencs:any = [];
    selected: any = 'sponsored';
    loader:boolean = false;
    // MatPaginator Inputs
    pageSize = 2;
    length = 10;
    currentPage = 0;
    // MatPaginator Output
    pageEvent: PageEvent;
    constructor(
        private router: Router,
        private http: HttpClient,
        private agenciesService: AgenciesService,

        ) {
    }
    ngOnInit() {
        this.getAgencsData(null);
    }
    getAgencsData(event?: PageEvent){
        this.loader = true;
        this.agenciesService.getAgencies('',
            res => {
                let response = res.json();
                this.agencs = response.data;
                this.pageSize = response.pageSize;
                this.length = response.length;
                this.loader = false;
            },
            error => {

            }
        );
    }
}
