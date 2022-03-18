import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';


@Component({
  selector: 'app-agregar-persona',
  templateUrl: './agregar-persona.component.html',
  styleUrls: ['./agregar-persona.component.css']
})
export class AgregarPersonaComponent implements OnInit {
  formPersona:FormGroup;

  constructor(public formulario:FormBuilder) { 
    this.formPersona=this.formulario.group({
      nombre:[''],
      email:['']
    });
  }

  ngOnInit(): void {
  }
  enviarDatos():any{
    console.log("Me presionaste");
  }

}
