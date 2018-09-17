import React, {Component} from 'react';
import {BrowserRouter as Router, Link, Route} from 'react-router-dom';
import Home from "./Home";
import About from "./About";
import Example from "./Example";

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
                        <Link className="navbar-brand" to='/'>TeamShelf</Link>

                        <div className="collapse navbar-collapse"
                             id="navbarSupportedContent">
                            <ul className="navbar-nav mr-auto">
                                <li className="nav-item active">
                                    <Link
                                        className="nav-link btn-outline-success"
                                        to='/'>Home</Link>
                                </li>
                                <li className="nav-item">
                                    <Link
                                        className="nav-link btn-outline-success"
                                        to='/about'>About</Link>
                                </li>
                                <li className="nav-item">
                                    <Link
                                        className="nav-link btn-outline-success"
                                        to='/example'>Admins</Link>
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
                        </div>
                    </nav>

                    <Route exact path='/' component={Home}/>
                    <Route exact path='/about' component={About}/>
                    <Route exact path='/example' component={Example}/>
                </div>
            </Router>
        );
    }
}
