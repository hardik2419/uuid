import { Component, OnInit ,Input } from '@angular/core';
import { Router } from '@angular/router';

@Component({
    selector: 'app-rating-star',
    templateUrl: './rating-star.component.html',
    styleUrls: ['./rating-star.component.scss']
})
export class RatingStarComponent implements OnInit {
    @Input() percentage: any;
    constructor(
        public router: Router,
    ) {}
    ngOnInit() {

    }
}