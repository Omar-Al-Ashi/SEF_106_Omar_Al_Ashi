import React, {Component} from 'react';
import {BrowserRouter, Link} from 'react-router-dom';
import Login from "../Pages/Login";
import {
    Navbar,
    NavbarBrand,
    NavbarNav,
    NavbarToggler,
    Collapse,
    NavItem,
    NavLink,
    Dropdown,
    DropdownToggle,
    DropdownMenu,
    DropdownItem,
    Button
} from 'mdbreact';
import 'font-awesome/css/font-awesome.min.css';
import Router from '../Services/Router'

require('../Styles/Styles.css');

export default class Header extends Component {

    constructor(props) {
        super(props);
        this.state = {
            collapse: false,
            isWideEnough: false,
        };
        this.onClick = this.onClick.bind(this);
    }

    onClick() {
        this.setState({
            collapse: !this.state.collapse,
        });
    }

    render() {

        return (
            <BrowserRouter>
                <div className='alignCenter background navigationBar'>

                    <Navbar style={{backgroundColor: '#4C85F4'}} dark
                            expand="md" scrolling>
                        <NavbarBrand href="/">
                            <img
                                // TODO need to find a way not to input relative path*/}
                                src={require('../../../storage/app/public/images/TeamShelf.png')}
                                style={{height: 70, width: 100}}/>

                        </NavbarBrand>
                        {!this.state.isWideEnough &&
                        <NavbarToggler onClick={this.onClick}/>}
                        <Collapse isOpen={this.state.collapse} navbar>
                            <NavbarNav left>
                                <NavItem>
                                    <NavLink to="/">Home</NavLink>
                                </NavItem>
                                <NavItem>
                                    <NavLink to="/viewAll">View All</NavLink>
                                </NavItem>
                                <NavItem>
                                    <NavLink to="/edit">Edit</NavLink>
                                </NavItem>
                            </NavbarNav>

                            <NavbarNav right>
                                <NavItem>
                                    <NavLink to="/login">
                                        <Button
                                            style={{backgroundColor: '#8C8C8C'}}
                                            color="cyan">Logout</Button>
                                    </NavLink>
                                </NavItem>
                            </NavbarNav>
                        </Collapse>
                    </Navbar>


                    <Router/>
                </div>
            </BrowserRouter>
        );
    }
}
