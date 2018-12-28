import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeRoutingModule } from './home-routing.module';
import { HomeComponent } from './components/home.component';
import { SharedModule } from '../shared/shared.module';
import { MalihuScrollbarModule } from 'ngx-malihu-scrollbar';
@NgModule({
    imports: [
        CommonModule,
        HomeRoutingModule,
        MalihuScrollbarModule,
        SharedModule,
    ],
    declarations: [
        HomeComponent,
    ]
})
export class HomeModule {}
