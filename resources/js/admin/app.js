require('./bootstrap');

import {ckeditor} from "./scripts/ckeditor.js";
import {mainTable} from "./scripts/mainTable.js";
import {menuButton} from "./scripts/menuButton.js";
import {tabs} from "./scripts/tabs.js";
import {localeTabs} from "./scripts/localeTabs.js";
import { rightMenu } from "./scripts/rightMenu.js";
import {renderForm} from "./scripts/form.js";

ckeditor();
rightMenu();
mainTable();
menuButton();
tabs();
localeTabs();
renderForm();