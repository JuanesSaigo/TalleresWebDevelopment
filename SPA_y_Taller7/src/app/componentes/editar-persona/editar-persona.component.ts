import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { CrudService } from 'src/app/servicio/crud.service';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-editar-persona',
  templateUrl: './editar-persona.component.html',
  styleUrls: ['./editar-persona.component.css']
})
export class EditarPersonaComponent implements OnInit {
  formPersona:FormGroup;
  elID:any;

  constructor(private activeRoute:ActivatedRoute, private crudService:CrudService,public formulario:FormBuilder,private ruteador:Router) {
    this.elID=this.activeRoute.snapshot.paramMap.get('id');
    this.crudService.ObtenerP(this.elID).subscribe(respuesta=>{
      console.log(respuesta);
      this.formPersona.setValue({
        nombre:respuesta[0]['nombre'],
        apellido:respuesta[0]['apellido'],
        tipodoc:respuesta[0]['tipodoc'],
        doc:respuesta[0]['doc'],
        lnac:respuesta[0]['lnac'],
        fnac:respuesta[0]['fnac'],
        email:respuesta[0]['email'],
        tell:respuesta[0]['tell'],
        user:respuesta[0]['user'],
        passw:respuesta[0]['passw'],
        passw2:respuesta[0]['passw2'],
        lres:respuesta[0]['lres']
      });
    });
    this.formPersona = this.formulario.group(
      {
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
      }
    );
   }

  ngOnInit(): void {
  }

  enviarDatos():any{
    console.log(this.elID);
    console.log(this.formPersona.value);
    this.crudService.EditarPersona(this.elID,this.formPersona.value).subscribe((respuesta)=>{
      this.ruteador.navigateByUrl('/listar-persona')
    });
    
  }

}
