import { Component, OnInit } from '@angular/core';
import { PointsService } from '../services/points.service';
import { Points } from '../models/points';
import { TeamsService } from '../services/teams.service';
import { Team } from '../models/teams';
@Component({
  selector: 'app-points',
  templateUrl: './points.component.html',
  styleUrls: ['./points.component.css']
})
export class PointsComponent implements OnInit {
  points:Points[]
  teamArray = [];
  teams: Team[] = [];
  constructor(private pointsService:PointsService,private teamService:TeamsService) { }

  ngOnInit() {
    this.getPoints()
    this.getTeams()
  }

  getPoints():void {
    this.pointsService.getPoints().subscribe(
      (res) => {
        if(res.data !==undefined){
          this.points = res.data;
        }
      }
    )
  }

  getTeams():void {
    this.teamService.getTeams().subscribe(
      (res) => {
        if(res.data !==undefined){
          this.teams = res.data;
          this.teams.forEach(element => {
            this.teamArray[element.id]=element.name
          });
        }
      }
    )
  }
}
