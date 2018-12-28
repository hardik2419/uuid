import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';

declare let $: any;
@Component({
    selector: 'app-sidebar',
    templateUrl: './sidebar.component.html',
    styleUrls: ['./sidebar.component.scss'],
})
export class SideBarComponent implements OnInit {
    lightScrollbarOptions = { axis: 'y', theme: 'light' };
    constructor(
            private router: Router,
            private http: HttpClient,


        ) {
    }
    ngOnInit() {
        $('#dismiss, .overlay').on('click', function () {
            $('.sidebarbutton').removeClass('active');
            $('#sidebar').removeClass('active');
            $('body').removeClass('active');
            $('.overlay').fadeOut();
        });

        $('#sidebarCollapse').on('click', function () {
            $('.sidebarbutton').addClass('active');
            $('#sidebar').addClass('active');
            $('body').addClass('active');
            $('.overlay').fadeIn();
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    }

}
