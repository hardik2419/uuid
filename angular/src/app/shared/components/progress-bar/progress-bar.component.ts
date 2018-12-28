import { Component, OnInit ,Input } from '@angular/core';
import { Router } from '@angular/router';

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
    constructor(
        public router: Router,
    ) {}
    ngOnInit() {

    }
}