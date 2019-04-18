import { Component, OnInit } from '@angular/core';
import { Team } from '../models/teams';
import { TeamsService } from '../services/teams.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  teams: Team[] = [];
  loaded:boolean = false;
  teamId:string;
  constructor(private teamService:TeamsService) { }

  ngOnInit() {
    this.getTeams()
  }
  getTeams():void {
    this.teamService.getTeams().subscribe(
      (res) => {
        if(res.data !==undefined){
          this.teams = res.data;
        }
        
      }
    )
  }
  getTeamMembers(teamId:string ):void{
    this.teamId=teamId
    this.loaded=true
  }
}