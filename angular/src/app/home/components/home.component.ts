import { Component, OnInit, ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { ChatBotService } from '../../shared/services/chat-bot.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

declare let $:any;

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
    showFiller = false;
    chatlist: any = [];
    start_contversion: any = {};
    chatmessage: any;
    chatform: FormGroup;
    darkScrollbarOptions = { axis: 'y', theme: 'dark' };
    submitted = false;
    chatloader:boolean = false;
    constructor(
        private router: Router,
        private http: HttpClient,
        private chatBotService: ChatBotService,
        private formBuilder: FormBuilder,

    ) {
    }
    ngOnInit() {
        this.scrollEvent();
        this.start_contversion = {
            userId: Math.floor(Math.random() * 9000000000) + 1000000000,
            driver: 'web',
            interactive: true,
            message: 'hi',
        }
        this.chatform = this.formBuilder.group({
            message: ['', Validators.required]
        });
        this.chatBotService.getBotman(this.start_contversion,
            res => {
                let data = res.json();
                var i = 1;
                for (let chatdata of data.messages) {
                    chatdata.noimg = true;
                    this.chatlist.push(chatdata);
                    i++;
                }
                this.submitted = false;
                this.chatform.get('message').setValue('');
                this.chatform.get('message').setValidators([Validators.required]);
                this.chatform.get('message').updateValueAndValidity();
                this.scrollEvent();
                this.chatloader = false;
            },
            error => {

            }
        );

    }
    get f() { return this.chatform.controls; }
    scrollEvent() {
        $(window).bind("resize", function () {
            var height = $(window).height();
            if ($(window).width() > 600) {
                var k = 250;
            } else {
                var k = 200;
            }
            $('.chatboard .col-12').height(height - k);
        }).trigger("resize");

    }
    chatQues(data:any){
        this.chatform.get('message').setValue(data);
        this.chatform.get('message').setValidators([]);
        this.chatform.get('message').updateValueAndValidity();
        this.onSubmit();
    }
    onSubmit() {
        this.submitted = true;
        this.chatloader =true;
        if (!this.chatform.valid){
            this.chatloader = false;
            return false;
        }else{
            this.chatform.value.userId = this.start_contversion.userId;
            this.chatform.value.driver = this.start_contversion.driver;
            this.chatform.value.interactive = this.start_contversion.interactive;
            this.chatlist.push(this.chatform.value);
            this.chatBotService.getBotman(this.chatform.value,
                res => {
                    let data = res.json();
                    var i = 1;
                    for (let chatdata of data.messages) {
                        if (this.chatlist[i-1].userId == chatdata.userId)
                        {
                            chatdata.noimg = true;
                        }else{
                            chatdata.noimg = false;
                        }
                        this.chatlist.push(chatdata);
                        i++;
                    }
                    this.submitted = false;
                    this.chatform.get('message').setValue('');
                    this.chatform.get('message').setValidators([Validators.required]);
                    this.chatform.get('message').updateValueAndValidity();
                    this.scrollEvent();
                    $('.row.chatboard .col-12').animate({
                        scrollTop: $('.row.chatboard .col-12 .mCSB_container')[0].scrollHeight
                    }, "slow");
                    this.chatloader = false;
                },
                error => {

                }
            );
        }
    }
}
