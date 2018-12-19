import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

@Injectable()

export class Home {
    constructor(public http: Http) {

    }
    getBotman(data: any, success?: any, error?: any) {
        let user_info = this.http.post('botman', data);
        if (success == undefined) {
            return user_info;
        } else {
            if (error == undefined) {
                user_info.subscribe(success);
            } else {
                user_info.subscribe(success, error);
            }
        }
    }
}
