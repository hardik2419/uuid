import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
    { path: 'login', loadChildren: './layout/layout.module#LayoutModule'},
    { path: 'dashboard', loadChildren: './dashboard/dashboard.module#DashboardModule'},
    { path: '', loadChildren: './home/home.module#HomeModule'}
];

@NgModule({
    imports: [RouterModule.forRoot(routes, { useHash: true })],
    exports: [RouterModule]
})
export class AppRoutingModule {}
