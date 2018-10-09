import React, {Component} from 'react';
import {BrowserRouter, Link, Redirect} from 'react-router-dom';
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
import Router from '../Services/Router';


require('../Styles/Styles.css');

export default class Header extends Component {

    constructor(props) {
        super(props);
        this.state = {
            collapse: false,
            isWideEnough: false,
            search: "",
            redirect: false,
        };
        this.onClick = this.onClick.bind(this);
        this.submitHandler = this.submitHandler.bind(this);
        this.handleSearchChange = this.handleSearchChange.bind(this);

    }

    onClick() {
        this.setState({
            collapse: !this.state.collapse,
        });
    }

    submitHandler(event) {
        event.preventDefault();
        console.log(this.state.search);
        this.setState({
            redirect: true
        })
    }

    handleSearchChange(value) {
        this.setState({
            search: value.target.value,
            redirect: false
        });
    }

    render() {

        // if (this.state.redirect) {
        //     return (
        //         <BrowserRouter>
        //             <Redirect to='/search' name='Omar'/>
        //         </BrowserRouter>);
        // }

        return (
            <BrowserRouter>
                <div>
                    {this.state.redirect ?

                        <Redirect to={{
                            pathname: '/search',
                            state: { for: this.state.search }
                        }} />
                        : <div></div>}
                    <div className='alignCenter background navigationBar'>

                        <Navbar style={{backgroundColor: '#4C85F4'}} dark
                                expand="md" scrolling>
                            <NavbarBrand href="/">
                                <img
                                    // TODO need to find a way not to input relative path*/}
                                    src={require('../../../public/images/TeamShelf.png')}
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
                                        <NavLink to="/viewAll">View
                                            All</NavLink>
                                    </NavItem>
                                    <NavItem>
                                        <NavLink to="/edit">Edit</NavLink>
                                    </NavItem>
                                </NavbarNav>

                                <NavbarNav right>

                                    <NavItem>
                                        <form
                                            className="form-inline md-form mt-0 searchBox"
                                            onSubmit={this.submitHandler}>
                                            <input
                                                className="form-control mr-sm-2 mb-0"
                                                type="text" placeholder="Search"
                                                aria-label="Search"
                                                name="search"
                                                value={this.state.search}
                                                onChange={this.handleSearchChange}/>
                                            <button type="submit"
                                                    value="Submit">Submit
                                            </button>

                                        </form>
                                    </NavItem>

                                    <NavItem>
                                        <NavLink to="/login">
                                            {sessionStorage.getItem('session') ?
                                                <Button
                                                    style={{backgroundColor: '#8C8C8C'}}
                                                    color="cyan">Logout</Button> :
                                                <Button
                                                    style={{backgroundColor: '#8C8C8C'}}
                                                    color="cyan">Login</Button>}
                                        </NavLink>
                                    </NavItem>
                                </NavbarNav>
                            </Collapse>
                        </Navbar>
                        <Router/>
                    </div>
                </div>
            </BrowserRouter>
        );
    }
}
