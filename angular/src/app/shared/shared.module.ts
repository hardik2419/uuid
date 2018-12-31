import { NgModule, ModuleWithProviders } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpModule } from '@angular/http';
import { FormsModule,ReactiveFormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';

import { MatInputModule, MatSelectModule, MatCheckboxModule ,MatButtonModule, MatIconModule,MatPaginatorModule } from '@angular/material';
import { Conopnents } from "./components";
import { MalihuScrollbarModule } from 'ngx-malihu-scrollbar';
/*
Pipes
*/
import { Pipes } from './pipes';

/*
Services
*/

import { Services } from './services';


const Modules = [
    RouterModule,
    HttpModule,
    FormsModule,
    ReactiveFormsModule,
    MatInputModule,
    MatIconModule,
    MatSelectModule,
    MatCheckboxModule,
    MatPaginatorModule,
    MalihuScrollbarModule,
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
