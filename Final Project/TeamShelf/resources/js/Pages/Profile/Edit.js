import React, {Component} from 'react';
import {RadioGroup, RadioButton} from 'react-radio-buttons';
import axios from 'axios';
import {Input} from 'mdbreact';
import Stepper from 'react-stepper-horizontal';
import 'font-awesome/css/font-awesome.min.css';

require('../../Styles/Styles.css');

export default class Edit extends Component {

    constructor() {
        super();
        this.state = {
            id: '',
            dob: '',
            certificate_name: '',
            company_name: '',
            phone: '',
            description: '',
            first_name: '',
            gender: '',
            github: '',
            gpa: '',
            institute: '',
            company_location: '',
            title: '',
            last_name: '',
            linkedin: '',
            major: '',
            skill_level: '',
            skill_set_name: '',
            selectedFile: '',
            residency_location: '',
            experience_start_date: '',

            page: 1,
            steps: [{
                title: 'Personal Profile',
                onClick: (e) => {
                    e.preventDefault();
                    this.setState({
                        page: 1
                    })
                }
            }, {
                title: 'Experience',
                onClick: (e) => {
                    e.preventDefault();
                    this.setState({
                        page: 2
                    })
                }
            }, {
                title: 'Education',
                onClick: (e) => {
                    e.preventDefault();
                    this.setState({
                        page: 3
                    })
                }
            }],
            currentStep: 0,
        };


        let config = {
            headers: {'Authorization': "Bearer " + sessionStorage.getItem('session')}
        };

        axios.post('api/get-details', "nothing", config
        ).then(response => {
            this.setState({
                id: response.data.success.id
            });
            console.log('the id is ' + this.state.id);

            let config = {
                headers: {'Authorization': "Bearer " + sessionStorage.getItem('session')}
            };
            axios.get('api/graduate/' + this.state.id, config).then(response => {

                this.setState({
                    dob: response.data[0].DOB,
                    certificate_name: response.data[0].certificate_degree_name,
                    company_name: response.data[0].company_name,
                    phone: response.data[0].contact_number,
                    description: response.data[0].description,
                    first_name: response.data[0].first_name,
                    gender: response.data[0].gender,
                    github: response.data[0].github,
                    gpa: response.data[0].grade_gpa,
                    institute: response.data[0].institute_university_name,
                    company_location: response.data[0].job_location,
                    title: response.data[0].job_title,
                    last_name: response.data[0].last_name,
                    linkedin: response.data[0].linkedin,
                    major: response.data[0].major,
                    skill_level: response.data[0].skill_level,
                    skill_set_name: response.data[0].skill_set_name,
                    selectedFile: response.data[0].user_image,
                    residency_location: response.data[0].residency_location,
                });
                // console.log(response)
            }).then(response => {
                console.log(response);
            }).catch(errors => {
                console.log(errors.response);
            });

        }).catch(errors => {
            console.log(errors.response);
        });

        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.onGenderChange = this.onGenderChange.bind(this);
        this.onProfilePicChange = this.onProfilePicChange.bind(this);
        this.handleIsCurrentJobChange = this.handleIsCurrentJobChange.bind(this);
        this.handleFormSubmit = this.handleFormSubmit.bind(this);
        this.onClickNext = this.onClickNext.bind(this);
    }

    onGenderChange(value) {
        this.setState({
            gender: value
        });
    }

    onProfilePicChange(event) {
        this.setState({
            selectedFile: event.target.files[0]
        });
        console.log("The state is " + this.state.selectedFile);
    };

    handleFieldChange(value) {
        this.setState({
            [value.target.name]: value.target.value
        });
        console.log("The field changed is " + [value.target.name] + " and the value is " + value.target.value);
    }

    handleIsCurrentJobChange(value) {
        this.setState({
            isCurrentJob: value
        });
    }

    handleResidencyLocationChange(value) {
        this.setState({
            residency_location: value.target.value
        });
    }

    handleFormSubmit(event) {
        let formData = {
            id: this.state.id,
            dob: this.state.dob,
            gender: this.state.gender,
            phone: this.state.phone,
            first_name: this.state.first_name,
            last_name: this.state.last_name,
            residency_location: this.state.residency_location,
            major: this.state.major,
            institute: this.state.institute,
            education_start_date: this.state.education_start_date,
            education_end_date: this.state.education_end_date,
            gpa: this.state.gpa,
            certificate_name: this.state.certificate_name,
            education_description: this.state.education_description,
            isCurrentJob: this.state.isCurrentJob,
            experience_start_date: this.state.experience_start_date,
            experience_end_date: this.state.experience_end_date,
            title: this.state.title,
            company_name: this.state.company_name,
            company_location: this.state.company_location,
            description: this.state.description,
            skills: this.state.skill_set_name,
            skill_level: this.state.skill_level,
            linkedin: this.state.linkedin,
            github: this.state.github,
            headers: {'Authorization': "Bearer " + sessionStorage.getItem('session')}
        };

        const picForm = new FormData();
        picForm.append('profile_picture', this.state.selectedFile);
        picForm.append('id', this.state.id);
        picForm.append('Accept', 'image/png');
        picForm.append('extension', this.state.selectedFile.name);

        event.preventDefault();
        axios.post('/api/graduate/edit', formData)
            .then(res =>
                res.data.response_code === 1 ? console.log('It worked') : console.log('something went'));

        axios.post('/api/graduate/profileImage', picForm)
            .then(res => {
                console.log("image response is " + res);

            });
    }

    onClickNext() {
        const {currentStep} = this.state;
        this.setState({
            currentStep: currentStep + 1,
            page: this.state.page + 1
        });
    }

    handleChange(value) {
        this.setState({
            [value.target.name]: value.target.value
        });
        console.log("The dob state is " + value.target.name)
    }

    render() {

        return (
            <div>
                <div className='background alignCenter'>
                    <form onSubmit={this.handleFormSubmit}>
                        <Stepper steps={this.state.steps}
                                 activeStep={this.state.currentStep}/>
                        {this.state.page === 1 ?
                            // Basic Info
                            <div className=" col-sm-4 formBox">
                                <h2 className="formHeaderTitle">Basic Info</h2>
                                <hr className='hr'/>
                                <div className="centered">
                                    <div className='formSection'>
                                        <div className='form-group'>

                                            {/*Date of Birth*/}
                                            <div className='date_of_birth'>
                                                <label htmlFor="date_of_birth">Date
                                                    of
                                                    Birth</label>
                                                <input type='date'
                                                       name='dob'
                                                       placeholder='Date of Birth'
                                                       className='form-control'
                                                       id='date_of_birth'
                                                       value={this.state.dob}
                                                       onChange={this.handleFieldChange}
                                                />
                                            </div>

                                            {/*Gender*/}
                                            <div className='gender'>
                                                <label>Gender</label>
                                                <RadioGroup
                                                    onChange={this.onGenderChange}
                                                    horizontal
                                                    selectedvalue={"Male"}>
                                                    <RadioButton value="Male">
                                                        Male
                                                    </RadioButton>
                                                    <RadioButton value="Female">
                                                        Female
                                                    </RadioButton>
                                                    <RadioButton value="Other">
                                                        Other
                                                    </RadioButton>
                                                </RadioGroup>
                                            </div>
                                        </div>

                                        {/*Phone*/}
                                        <div className='phone'>
                                            <label htmlFor="phone">Phone</label>
                                            <input type='phone'
                                                   placeholder='Phone'
                                                   className='form-control'
                                                   id='phone'
                                                   name="phone"
                                                   value={this.state.phone}
                                                   onChange={this.handleFieldChange}
                                                   required/>
                                        </div>

                                        {/*Profile Pic*/}
                                        <div className='profile_pic'>

                                            {/*TODO change the button of the upload pic*/}
                                            <label htmlFor="profile_pic">Profile
                                                Picture</label>
                                            <input type="file"
                                                   onChange={this.onProfilePicChange}
                                                   required
                                                   name='selectedFile'/>
                                        </div>

                                        {/*First Name*/}
                                        <div className='first_name'>
                                            <label htmlFor="first_name">First
                                                Name</label>
                                            <input type='text'
                                                   placeholder='First Name'
                                                   className='form-control'
                                                   id='first_name'
                                                   value={this.state.first_name}
                                                   onChange={this.handleFieldChange}
                                                   name='first_name'
                                                   required/>
                                        </div>

                                        {/*Last Name*/}
                                        <div className='last_name'>
                                            <label htmlFor="last_name">Last
                                                Name</label>
                                            <input type='text'
                                                   placeholder='Last Name'
                                                   className='form-control'
                                                   id='last_name'
                                                   value={this.state.last_name}
                                                   onChange={this.handleFieldChange}
                                                   name='last_name'
                                                   required/>
                                        </div>

                                        {/*Residency Location*/}
                                        <div className='residency_location'>
                                            <label htmlFor="residency_location">Residency
                                                Location</label>
                                            <input type='text'
                                                   placeholder='Residency Location'
                                                   className='form-control'
                                                   id='residency_location'
                                                   value={this.state.residency_location}
                                                   onChange={this.handleFieldChange}
                                                   name='residency_location'
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            :
                            this.state.page === 2 ?
                                // Experience
                                <div className=" col-sm-4 formBox">
                                    <h2 className="formHeaderTitle">Experience</h2>
                                    <hr className='hr'/>
                                    <div className="centered">
                                        <div className='formSection'>

                                            {/*is Current Job*/}
                                            <div className='is_current_job'>
                                                <label htmlFor="is_current_job">Current
                                                    Job</label>
                                                <RadioGroup
                                                    onChange={this.handleIsCurrentJobChange}
                                                    horizontal
                                                    selectedvalue={"1"}>
                                                    <RadioButton value="1">
                                                        Yes
                                                    </RadioButton>
                                                    <RadioButton value="0">
                                                        No
                                                    </RadioButton>
                                                </RadioGroup>
                                            </div>

                                            {/*Experience Start Date*/}
                                            <div
                                                className='experience_start_date'>
                                                <label
                                                    htmlFor="experience_start_date">Start
                                                    Date</label>
                                                <input type='date'
                                                       placeholder='Start Date'
                                                       className='form-control'
                                                       id='experience_start_date'
                                                       value={this.state.experience_start_date}
                                                       name='experience_start_date'
                                                       onChange={this.handleFieldChange}
                                                />
                                            </div>

                                            {/*Experience End Date*/}
                                            <div
                                                className='experience_end_date'>
                                                <label
                                                    htmlFor="experience_end_date">End
                                                    Date</label>
                                                <input type='date'
                                                       placeholder='End Date'
                                                       className='form-control'
                                                       id='experience_end_date'
                                                       value={this.state.experience_end_date}
                                                       onChange={this.handleFieldChange}
                                                       name='experience_end_date'
                                                />
                                            </div>

                                            {/*Title*/}
                                            <div>
                                                <label
                                                    htmlFor="title">Title</label>
                                                <input type='text'
                                                       placeholder='Title'
                                                       className='form-control'
                                                       id='title'
                                                       value={this.state.title}
                                                       onChange={this.handleFieldChange}
                                                       name='title'
                                                       required/>
                                            </div>

                                            {/*Company Name*/}
                                            <div className='company_name'>
                                                <label htmlFor="company_name">Company
                                                    Name</label>
                                                <input type='text'
                                                       placeholder='Company Name'
                                                       className='form-control'
                                                       id='company_name'
                                                       value={this.state.company_name}
                                                       onChange={this.handleFieldChange}
                                                       name='company_name'
                                                       required/>
                                            </div>

                                            {/*Company Location*/}
                                            <div className='company_lcoation'>
                                                <label
                                                    htmlFor="company_lcoation">Company
                                                    Location</label>
                                                <input type='text'
                                                       placeholder='Company Location'
                                                       className='form-control'
                                                       id='company_lcoation'
                                                       value={this.state.company_location}
                                                       onChange={this.handleFieldChange}
                                                       name='company_location'
                                                       required/>
                                            </div>

                                            {/*Description*/}
                                            <div className='description'>
                                                <label
                                                    htmlFor="description">Description</label>
                                                <input type='text'
                                                       placeholder='Description'
                                                       className='form-control'
                                                       id='description'
                                                       value={this.state.description}
                                                       onChange={this.handleFieldChange}
                                                       name='description'
                                                />
                                            </div>

                                            {/*Skills*/}
                                            <div className='skills'>
                                                <label
                                                    htmlFor="skills">Skills</label>
                                                <input type='text'
                                                       placeholder='Skills'
                                                       className='form-control'
                                                       id='skills'
                                                       value={this.state.skill_set_name}
                                                       onChange={this.handleFieldChange}
                                                       name='skill_set_name'
                                                       required/>
                                            </div>

                                            {/*Skill Level*/}
                                            <div className='skill_level'>
                                                <label htmlFor="skill_level">Skill
                                                    Level</label>
                                                <input type='text'
                                                       placeholder='Skill Level'
                                                       className='form-control'
                                                       id='skill_level'
                                                       value={this.state.skill_level}
                                                       onChange={this.handleFieldChange}
                                                       name='skill_level'
                                                       required/>
                                            </div>

                                            {/*LinkedIn*/}
                                            <div className='linkedIn'>
                                                <div><i
                                                    className="fa fa-linkedin socialMediaIcon"/>
                                                </div>
                                                <input type='text'
                                                       placeholder='LinkedIn'
                                                       className='form-control'
                                                       id='linkedIn'
                                                       value={this.state.linkedin}
                                                       onChange={this.handleFieldChange}
                                                       name='linkedin'
                                                       required/>
                                            </div>

                                            {/*GitHub*/}
                                            <div className='GitHub'>
                                                <div><i
                                                    className="fa fa-github socialMediaIcon"/>
                                                </div>
                                                <input type='text'
                                                       placeholder='GitHub'
                                                       className='form-control'
                                                       id='GitHub'
                                                       value={this.state.github}
                                                       onChange={this.handleFieldChange}
                                                       name='github'
                                                       required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                :
                                // Education
                                <div className=" col-sm-4 formBox">
                                    <h2 className="formHeaderTitle">Education</h2>
                                    <hr className='hr'/>
                                    <div className="centered">
                                        <div className='formSection'>

                                            {/*Major*/}
                                            <div className='major'>
                                                <label
                                                    htmlFor="major">Major</label>
                                                <input type='text'
                                                       placeholder='Major'
                                                       className='form-control'
                                                       id='major'
                                                       value={this.state.major}
                                                       onChange={this.handleFieldChange}
                                                       name='major'
                                                       required/>
                                            </div>

                                            {/*Institute*/}
                                            <div className='institute'>
                                                <label
                                                    htmlFor="institute">Institute</label>
                                                <input type='text'
                                                       placeholder='Institute'
                                                       className='form-control'
                                                       id='institute'
                                                       value={this.state.institute}
                                                       onChange={this.handleFieldChange}
                                                       name='institute'
                                                       required/>
                                            </div>

                                            {/*Education Start Date*/}
                                            <div
                                                className='education_start_date'>
                                                <label
                                                    htmlFor="education_start_date">Start
                                                    Date</label>
                                                <input type='date'
                                                       placeholder='Start Date'
                                                       className='form-control'
                                                       id='education_start_date'
                                                       value={this.state.education_start_date}
                                                       onChange={this.handleFieldChange}
                                                       name='education_start_date'
                                                />
                                            </div>

                                            {/*Education End Date*/}
                                            <div className='education_end_date'>
                                                <label
                                                    htmlFor="education_end_date">End
                                                    Date</label>
                                                <input type='date'
                                                       placeholder='End Date'
                                                       className='form-control'
                                                       id='education_end_date'
                                                       value={this.state.education_end_date}
                                                       onChange={this.handleFieldChange}
                                                       name='education_end_date'
                                                />
                                            </div>

                                            {/*GPA*/}
                                            <div className='gpa'>
                                                <label htmlFor="gpa">GPA</label>
                                                <input type='number'
                                                       placeholder='GPA'
                                                       className='form-control'
                                                       id='gpa'
                                                       value={this.state.gpa}
                                                       onChange={this.handleFieldChange}
                                                       name='gpa'
                                                       required/>
                                            </div>

                                            {/*Certificate Name*/}
                                            <div className='certificate_name'>
                                                <label
                                                    htmlFor="certificate_name">Certificate
                                                    Name</label>
                                                <input type='text'
                                                       placeholder='Certificate Name'
                                                       className='form-control'
                                                       id='certificate_name'
                                                       value={this.state.certificate_name}
                                                       onChange={this.handleFieldChange}
                                                       name='certificate_name'
                                                       required/>
                                            </div>

                                            {/*Education Description*/}
                                            <div
                                                className='education_description'>
                                                <label
                                                    htmlFor="education_description">Description</label>
                                                <input type='text'
                                                       placeholder='Education Description'
                                                       className='form-control'
                                                       id='education_description'
                                                       value={this.state.description}
                                                       onChange={this.handleFieldChange}
                                                       name='description'
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        }
                        <div className='btnsContainer'>
                            <div className='nextButton'
                                 onClick={this.onClickNext}>Next
                            </div>
                            <button type="submit" value="Submit"
                                    className='btn submitButton'>Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        )
    }

}