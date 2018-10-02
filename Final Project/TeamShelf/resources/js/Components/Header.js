import React, {Component} from 'react';
import {BrowserRouter, Link} from 'react-router-dom';
import Login from "../Pages/Login";
import 'font-awesome/css/font-awesome.min.css';
import Router from '../Services/Router'

require('../Styles/Styles.css');

export default class Header extends Component {

    render() {

        return (
            <BrowserRouter>
                <div className='alignCenter'>
                    <nav
                        className="navbar navbar-expand-lg navbar-light white">
                        <Link className="navbar-brand" to='/'><img
                            // TODO need to find a way not to input relative path
                            src={require('../../../storage/app/public/images/TeamShelf.png')}
                            style={{height: 70, width: 100}}/></Link>

                        <div className="collapse navbar-collapse"
                             id="navbarSupportedContent">
                            <ul className="navbar-nav mr-auto">
                                <li className="nav-item">
                                    <i className='fa fa-home'/>
                                    <Link
                                        className="nav-link btn-outline-success"
                                        to='/'>Home</Link>
                                </li>

                                <li className="nav-item">
                                    <i className='fa fa-address-card'/>
                                    <Link
                                        className="nav-link btn-outline-success"
                                        to='/viewAll'>View All</Link>
                                </li>

                                <li className="nav-item">
                                    <i className='fa fa-pencil'/>
                                    <Link
                                        className="nav-link btn-outline-success"
                                        to='/edit'>Edit</Link>
                                </li>
                            </ul>
                            <li className="nav-item btn btn-outline-success my-2 my-sm-0">
                                <Link
                                    to='/login'>
                                    {sessionStorage.getItem("session") === null ? "Login" : "Logout"}
                                </Link>
                            </li>
                        </div>
                    </nav>
                    <Router/>
                </div>
            </BrowserRouter>
        );
    }
}
