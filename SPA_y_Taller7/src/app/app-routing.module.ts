import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { AgregarPersonaComponent } from './componentes/agregar-persona/agregar-persona.component';
import { EditarPersonaComponent } from './componentes/editar-persona/editar-persona.component';
import { ListarPersonaComponent } from './componentes/listar-persona/listar-persona.component';
import { HomeComponent } from './componentes/home/home.component';


const routes: Routes = [
  {path:'',pathMatch:'full',redirectTo:'home'},
  {path:'home',component:HomeComponent},
  {path:'agregar-persona',component:AgregarPersonaComponent},
  {path:'editar-persona/:id',component:EditarPersonaComponent},
  {path:'listar-persona',component:ListarPersonaComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
