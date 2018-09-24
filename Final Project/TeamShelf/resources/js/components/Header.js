import React, {Component} from 'react';
import {BrowserRouter as Router, Link, Route} from 'react-router-dom';
import Home from "../Pages/Home";
import About from "../Pages/About";
import Example from "../Pages/Example";
import Login from "../Pages/Login";
import Edit from "../Pages/profile/Edit";
import ProfileCard from "./ProfileCard";
import ViewAll from "../Pages/profile/ViewAll";
import 'font-awesome/css/font-awesome.min.css';
import GraduateInfo from "../Pages/profile/GraduateInfo";


require('../styles/styles.css');

export default class Header extends Component {

    render() {
        return (
            <Router>
                <div className='alignCenter'>
                    {/*<Link to='/'>Home</Link>*/}
                    {/*<Link to='/about'>About</Link>*/}
                    {/*<Link to='/example'>Example</Link>*/}

                    <nav
                        className="navbar navbar-expand-lg navbar-light  white">
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
                                {/*<li className="nav-item">*/}
                                {/*<Link*/}
                                {/*className="nav-link btn-outline-success"*/}
                                {/*to='/about'>About</Link>*/}
                                {/*</li>*/}
                                {/*<li className="nav-item">*/}
                                {/*<Link*/}
                                {/*className="nav-link btn-outline-success"*/}
                                {/*to='/example'>Admins</Link>*/}
                                {/*</li>*/}
                                <li className="nav-item">
                                    <i className='fa fa-pencil'/>
                                    <Link
                                        className="nav-link btn-outline-success"
                                        to='/edit'>Edit</Link>
                                </li>
                            </ul>
                            <form className="form-inline my-2 my-lg-0">
                                <input className="form-control mr-sm-2"
                                       type="search" placeholder="Search"
                                       aria-label="Search"/>
                                <button
                                    className="btn btn-outline-success my-2 my-sm-0"
                                    type="submit">Search
                                </button>
                            </form>

                            <li className="nav-item btn btn-outline-success my-2 my-sm-0">
                                <Link
                                    to='/login'>Login
                                </Link>
                            </li>
                        </div>
                    </nav>

                    <Route exact path='/' component={Home}/>
                    <Route exact path='/about' component={About}/>
                    <Route exact path='/example' component={Example}/>
                    <Route exact path='/login' component={Login}/>
                    <Route exact path='/edit' component={Edit}/>
                    <Route exact path='/viewAll' component={ViewAll}/>
                </div>
            </Router>
        );
    }
}
