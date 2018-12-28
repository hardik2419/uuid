import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
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
    submitted:boolean = false;
    agenciesform: FormGroup;
    constructor(
        private router: Router,
        private http: HttpClient,
        private formBuilder: FormBuilder,

        ) {
    }
    ngOnInit() {
        this.agenciesform = this.formBuilder.group({
            username: ['', Validators.required],
            password: ['', Validators.required]
        });
    }
    get f() {
        return this.agenciesform.controls;
    }

    onSubmit() {

    }
}
