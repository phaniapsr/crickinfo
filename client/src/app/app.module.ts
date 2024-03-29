import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';
import { FormsModule }    from '@angular/forms';
import { HttpClientModule }    from '@angular/common/http';
import {AppRoutingModule} from './app-routing.module';
import { DashboardComponent } from './dashboard/dashboard.component';
import { MatchComponent } from './match/match.component';
import { PlayerComponent } from './player/player.component';
import { PointsComponent } from './points/points.component';

@NgModule({
  declarations: [
    AppComponent,
    DashboardComponent,
    MatchComponent,
    PlayerComponent,
    PointsComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule,
    HttpClientModule,
  ],
  providers: [],

  bootstrap: [AppComponent]
})
export class AppModule { }