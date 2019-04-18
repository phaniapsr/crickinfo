import { Component, OnInit, ViewChild } from '@angular/core';
import { MatchService } from '../services/match.service';
import {Match} from '../models/match';
import * as $ from 'jquery';
import { TeamsService } from '../services/teams.service';
import { Team } from '../models/teams';
import {NgForm} from '@angular/forms';

@Component({
  selector: 'app-match',
  templateUrl: './match.component.html',
  styleUrls: ['./match.component.css']
})
export class MatchComponent implements OnInit {
  @ViewChild('matchForm') formValues;
  matches: Match[] = [];
  submitted = false;
  match:Match; 
  teams: Team[] = [];
  teamId:string;
  teamArray = [];
  sameTeams:boolean = false;
  constructor(private matchService:MatchService,private teamService:TeamsService) { 
    
  }

  ngOnInit() {
    this.getMatches()
    this.getTeams()
    $(document).ready(function(){
      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
    });
    this.match = new Match();
    this.sameTeams=false
  }
  getMatches():void {
    this.matchService.getMatches().subscribe(
      (res) => {
        if(res.data !==undefined){
          this.matches = res.data;
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
  
  onSubmit(matchForm: NgForm) { 
    if(matchForm.value.first_team==matchForm.value.second_team){
      this.sameTeams=true
      return
    }
    this.matchService.fixMatch(matchForm.value).subscribe(
      (res) => {
        this.formValues.resetForm();
        this.sameTeams=false;
        this.getMatches()
      }
    )
  }

  onWinSubmit(matchForm: NgForm){
    matchForm.value.id=this.match.id
    matchForm.value.winning_team=parseInt(matchForm.value.winning_team) 
    this.matchService.fixWinningMatch(matchForm.value).subscribe(
      (res) => {
        this.formValues.resetForm();
        this.sameTeams=false
        this.getMatches()
      }
    )
  }
  getWinModel(match:Match){
    this.match=match
  }
  cleanForm(){
    //form.reset();
  }
}
