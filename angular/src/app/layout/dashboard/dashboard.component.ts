import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
declare var jQuery:any;

@Component({
    selector: 'app-dashboard',
    templateUrl: './dashboard.component.html',
    styleUrls: ['./dashboard.component.scss'],
})
export class DashboardComponent implements OnInit {
    constructor(
            private router: Router,
            private http: HttpClient

        ) {
    }
    ngOnInit() {
        var data = {
            email: 'test@gmail.com',
            password: 'test@123',
        }
        this.http.post('api/login',data).subscribe(data => {
            console.log(data);
        });

    }

}
