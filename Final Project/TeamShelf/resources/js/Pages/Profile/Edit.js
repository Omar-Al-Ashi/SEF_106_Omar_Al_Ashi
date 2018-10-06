import React, {Component} from 'react';
import {RadioGroup, RadioButton} from 'react-radio-buttons';
import axios from 'axios';
import {
    Input
} from 'mdbreact';
import Stepper from 'react-stepper-horizontal';

require('../../Styles/Styles.css');
import 'font-awesome/css/font-awesome.min.css';

export default class Edit extends Component {

    constructor() {
        super();
        this.state = {
            page: 1,
            steps: [{
                title: 'Personal Profile',
                href: 'http://example1.com',
                phone: "",

                onClick: (e) => {
                    e.preventDefault();
                    console.log('onClick', 1)
                    this.setState({
                        page: 1
                    })
                }
            }, {
                title: 'Experience',
                href: 'http://example2.com',
                onClick: (e) => {
                    e.preventDefault();
                    console.log('onClick', 2)
                    this.setState({
                        page: 2
                    })
                }
            }, {
                title: 'Education',
                href: 'http://example4.com',
                onClick: (e) => {
                    e.preventDefault();
                    console.log('onClick', 4)
                    this.setState({
                        page: 4
                    })
                }
            }],
            currentStep: 0,
        };
        this.onClickNext = this.onClickNext.bind(this);
        this.handlePageChange = this.handlePageChange.bind(this);
    }

    onClickNext() {
        const {steps, currentStep} = this.state;
        this.setState({
            currentStep: currentStep + 1,
            page: this.state.page + 1
        });
    }

    handleChange(value) {
        this.setState({
            [value.target.name] : value.target.value
        });
        console.log("The dob state is " + value.target.name)
    }


    render() {

        const {steps, currentStep} = this.state;
        const buttonStyle = {
            background: '#E0E0E0',
            width: 200,
            padding: 16,
            textAlign: 'center',
            margin: '0 auto',
            marginTop: 32
        };

f
        return (
            <div>
                <Stepper steps={steps} activeStep={currentStep}/>
                {this.state.page === 1 ? <div>Page 1</div> : this.state.page === 2 ? <div>Page 2</div> : <div>Page 3</div>}
                <div style={buttonStyle} onClick={this.onClickNext}>Next</div>

            </div>
        )
    }

}