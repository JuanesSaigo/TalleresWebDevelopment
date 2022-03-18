import { Component, OnInit } from '@angular/core';
import { CrudService } from 'src/app/servicio/crud.service';

@Component({
  selector: 'app-listar-persona',
  templateUrl: './listar-persona.component.html',
  styleUrls: ['./listar-persona.component.css']
})
export class ListarPersonaComponent implements OnInit {
  Personas:any;

  constructor(private crudService:CrudService) { }

  ngOnInit(): void {
    this.crudService.ObtenerPersona().subscribe(respuesta=>{
      console.log(respuesta);
      this.Personas=respuesta;
    })
  }

  borrarRegistro(id:any,iControl:any){
    if(window.confirm("Deseas borrar este dato?")){
      this.crudService.BorrarPersona(id).subscribe((respuesta)=>{
        this.Personas.splice(iControl,1);
      });
    }
  }

}
