import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
    breadcrumbs = {
        pagetitle : 'User Account',
        link: 'user-account'
    };
    submitted:boolean = false;
    loginform: FormGroup;
    constructor(
        private router: Router,
        private http: HttpClient,
        private formBuilder: FormBuilder,

        ) {
    }
    ngOnInit() {
        this.loginform = this.formBuilder.group({
            username: ['', Validators.required],
            password: ['', Validators.required]
        });
    }
    get f() {
        return this.loginform.controls;
    }

    onSubmit() {

    }
}
