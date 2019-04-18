import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';
import {environment} from '../../environments/environment'

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};
@Injectable({
  providedIn: 'root'
})
export class MatchService {
  constructor(private http: HttpClient) { }
  private teamUrl = environment.apiUrl+'/api/match'
  getMatches(): Observable<any>{
    return this.http.get<any>(this.teamUrl).pipe(
      tap(_ => console.log()),
      catchError(this.handleError<any>('getMatches', []))
    );
  }
  fixMatch(data:any): Observable<any>{
    return this.http.post<any>(this.teamUrl, data, httpOptions).pipe(
      tap((newHero: any) => console.log(`added hero w/ id=${newHero.id}`)),
      catchError(this.handleError<any>('fixMatch'))
    );
  }
  fixWinningMatch(data:any): Observable<any>{
    return this.http.put<any>(this.teamUrl+'/'+data.id+'/points', data, httpOptions).pipe(
      tap((newHero: any) => console.log(`added hero w/ id=${newHero.id}`)),
      catchError(this.handleError<any>('fixMatch'))
    );
  }
  
/**
  * Handle Http operation that failed.
  * Let the app continue.
  * @param operation - name of the operation that failed
  * @param result - optional value to return as the observable result
  */
 private handleError<T> (operation = 'operation', result?: T) {
   return (error: any): Observable<T> => {
     console.error(error); // log to console instead
     return of(result as T);
   };
 }
}