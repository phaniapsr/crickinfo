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
export class PointsService {
  constructor(private http: HttpClient) { }
  private teamUrl = environment.apiUrl+'/api/points'
  getPoints(): Observable<any>{
    return this.http.get<any>(this.teamUrl).pipe(
      tap(_ => console.log()),
      catchError(this.handleError<any>('getPoints', []))
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