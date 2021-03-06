import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LayoutComponent } from './components/layout.component';

const routes: Routes = [
    {
        path: '',component: LayoutComponent,
        children: [
            { path: 'login', loadChildren: './../login/login.module#LoginModule' },
            { path: 'agencies', loadChildren: './../agencies/agencies.module#AgenciesModule' },
        ]
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class LayoutRoutingModule { }
