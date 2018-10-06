import React, {Component} from 'react';
import {Route, Switch} from 'react-router-dom';
import Home from "../Pages/Home";
import Login from "../Pages/Login";
import Edit from "../Pages/Profile/Edit";
import ViewAll from "../Pages/Profile/ViewAll";
import GraduateInfo from "../Pages/Profile/GraduateInfo";
import Search from "../Pages/Search";


export default class Router extends Component {
    render() {
        return (
            <div>
                <Switch>
                    <Route exact path='/' component={Home}/>
                    <Route exact path='/login' component={Login}/>
                    <Route exact path='/edit' component={Edit}/>
                    <Route exact path='/viewAll' component={ViewAll}/>
                    <Route exact path='/graduate/:id'
                           render={props => <GraduateInfo {...props}/>}
                    />

                    <Route exact path='/search' component={Search}/>
                </Switch>


            </div>
        )
    }
}