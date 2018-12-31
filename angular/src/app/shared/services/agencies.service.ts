import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

@Injectable()

export class AgenciesService {
    constructor(public http: Http) {

    }
    getAgencies(data: any, success?: any, error?: any) {
        let user_info = this.http.get('api/agencies', data);
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
