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
  }
  enviarDatos():any{
    console.log("Me presionaste");
    console.log(this.formPersona.value);
    this.CrudService.AgregarPersona(this.formPersona.value).subscribe(respuesta=>{
      this.ruteador.navigateByUrl('/listar-persona')
    });
    
  }

}
