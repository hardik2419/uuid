import { NgModule, ModuleWithProviders } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpModule } from '@angular/http';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';

import { MatInputModule, MatButtonModule } from '@angular/material';
import { Conopnents } from "./components";

/*
Pipes
*/
import { Pipes } from './pipes';

/*
Services
*/




const Services = [

];
const Modules = [
    RouterModule,
    HttpModule,
    FormsModule,
    MatInputModule,
    MatButtonModule,
]


@NgModule({
    imports: [
        CommonModule,
        ...Modules,
    ],
    declarations: [
        ...Conopnents,
        ...Pipes
    ],
    exports: [
        ...Conopnents,
        ...Modules,
        ...Pipes
    ]
})
export class SharedModule {
    static forRoot(): ModuleWithProviders {
        return {
            ngModule: SharedModule,
            providers: [
                ...Services,
            ]
        }
    }

}
