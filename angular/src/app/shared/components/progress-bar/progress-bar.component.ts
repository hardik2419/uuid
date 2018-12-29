import { Component, OnInit ,Input } from '@angular/core';
import { Router } from '@angular/router';
declare let $: any;
@Component({
    selector: 'app-progress-bar',
    templateUrl: './progress-bar.component.html',
    styleUrls: ['./progress-bar.component.scss']
})
export class ProgressBarComponent implements OnInit {
    @Input() percentage: any;
    @Input() Wdith: any;
    @Input() borderColor: any;
    @Input() fontSize: any;
    @Input() label: any;
    constructor(
        public router: Router,
    ) {}
    ngOnInit() {
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    }
}