import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { CrudService } from 'src/app/servicio/crud.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-agregar-persona',
  templateUrl: './agregar-persona.component.html',
  styleUrls: ['./agregar-persona.component.css']
})
export class AgregarPersonaComponent implements OnInit {
  formPersona:FormGroup;
  Ciudades:any;
  TDocs:any;

  constructor(public formulario:FormBuilder, private CrudService:CrudService, private ruteador:Router) { 
    this.formPersona=this.formulario.group({
      nombre:[''],
      apellido:[''],
      tipodoc:[''],
      doc:[''],
      lnac:[''],
      fnac:[''],
      email:[''],
      tell:[''],
      user:[''],
      passw:[''],
      passw2:[''],
      lres:['']

    });
  }

  ngOnInit(): void {
    this.CrudService.ObtenerCiudad().subscribe(respuesta1=>{
      console.log(respuesta1);
      this.Ciudades=respuesta1;
    })
    this.CrudService.ObtenerTipoDoc().subscribe(respuesta2=>{
      console.log(respuesta2);
      this.TDocs=respuesta2;
    })
  }
  enviarDatos():any{
    console.log("A ver si se agrega");
    console.log(this.formPersona.value);
    this.CrudService.AgregarPersona(this.formPersona.value).subscribe(respuesta=>{
      this.ruteador.navigateByUrl('/listar-persona')
    });
    
  }

}
