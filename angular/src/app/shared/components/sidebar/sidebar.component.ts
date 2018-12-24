import { Component, OnInit, AfterViewInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import * as $ from "jquery";
import { MalihuScrollbarService } from 'ngx-malihu-scrollbar';

@Component({
    selector: 'app-sidebar',
    templateUrl: './sidebar.component.html',
    styleUrls: ['./sidebar.component.scss'],
})
export class SideBarComponent implements OnInit, AfterViewInit, OnDestroy {
    lightScrollbarOptions = { theme: 'light' };
    constructor(
            private router: Router,
            private http: HttpClient,
            private mScrollbarService: MalihuScrollbarService

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
    ngAfterViewInit() {
        this.mScrollbarService.initScrollbar('#dark-card', this.lightScrollbarOptions);
    }

    ngOnDestroy() {
        this.mScrollbarService.destroy('#dark-card');
    }
}
