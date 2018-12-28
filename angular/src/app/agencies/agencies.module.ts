import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AgenciesRoutingModule } from './agencies-routing.module';
import { AgenciesComponent } from './components/agencies.component';
import { SharedModule } from '../shared';

@NgModule({
    imports: [
        CommonModule,
        AgenciesRoutingModule,
        SharedModule
    ],
    declarations: [
        AgenciesComponent,
    ]
})
export class AgenciesModule {}
