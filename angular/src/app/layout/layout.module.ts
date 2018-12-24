import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LayoutRoutingModule } from './layout-routing.module';
import { LayoutComponent } from './components/layout.component';
import { SharedModule } from './../shared/shared.module';

@NgModule({
    imports: [
        CommonModule,
        SharedModule,
        LayoutRoutingModule,
    ],
    declarations: [LayoutComponent]
})
export class LayoutModule {}
