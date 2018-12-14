import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import $ from 'jquery';
@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
    showFiller = false;
    constructor(
            private router: Router,
            private http: HttpClient

        ) {
    }
    ngOnInit() {
        $(window).bind("resize", function() {
            var height = $(window).height();
            if ($(window).width() > 600){
                var k = 250;
            }else{
                var k = 200;
            }
            $('.chatboard .col-12').height(height - k);

        }).trigger("resize");
    }
}
