import { Component, OnInit, OnChanges,Input } from '@angular/core';
import { PlayerService } from '../services/player.service';
import { Player } from '../models/player';


@Component({
  selector: 'app-player',
  templateUrl: './player.component.html',
  styleUrls: ['./player.component.css']
})
export class PlayerComponent implements OnInit, OnChanges  {
  @Input() teamId:string
  players:Player[]
  constructor(private playerService:PlayerService) { }
  ngOnChanges() {
    // create header using child_id
    this.getPlayers()
  }

  ngOnInit() {
    this.getPlayers()
  }
  
  getPlayers():void {
    this.playerService.getPlayers(this.teamId).subscribe(
      (res) => {
        if(res.data !==undefined){
          this.players = res.data;
        }
      }
    )
  }
}
