import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, observable } from 'rxjs';
import { Persona } from './Persona';

@Injectable({
  providedIn: 'root'
})
export class CrudService {

  API: string='http://localhost/persona/'

  constructor(private clienteHttp:HttpClient) {   }

   AgregarPersona(datosPersona:Persona):Observable<any>{
     return this.clienteHttp.post(this.API+"?insertar=1",datosPersona);
   }

   ObtenerPersona(){
     return this.clienteHttp.get(this.API);
   }

   BorrarPersona(id:any):Observable<any>{
    return this.clienteHttp.get(this.API+"?borrar="+id);
  }

  ObtenerP(id:any):Observable<any>{
    return this.clienteHttp.get(this.API+"?consultar="+id);
  }

  EditarPersona(id:any,datosPersona:any):Observable<any>{
    return this.clienteHttp.post(this.API+"?actualizar="+id,datosPersona);
  }
}
