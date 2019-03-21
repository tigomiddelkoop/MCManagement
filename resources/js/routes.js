import React from 'react';
import Dashboard from "./pages/Dashboard";
import {Route, BrowserRouter as Router} from "react-router-dom";
import Players from "./pages/Players";
import NavBar from "./components/NavBar";


const routes = (
        <Route path="/dashboard" component={Dashboard}/>,
        <Route path="/players" component={Players}/>
);

export default routes;