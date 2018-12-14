import { Component, OnInit, Input } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';

@Component({
    selector: 'app-logo',
    templateUrl: './logo.component.html',
    styleUrls: ['./logo.component.scss'],
})
export class LogoComponent implements OnInit {
    @Input() responsive:boolean = false;
    constructor(
            private router: Router,
            private http: HttpClient

        ) {
    }
    ngOnInit() {

    }
}
