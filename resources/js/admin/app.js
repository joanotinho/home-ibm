require('./bootstrap');

import {ckeditor} from "./scripts/ckeditor.js";
import {menuButton} from "./scripts/menuButton.js";
import {tabs} from "./scripts/tabs.js";
import {localeTabs} from "./scripts/localeTabs.js";
import { cleanConfirmation } from "./scripts/cleanConfirmation.js";
import {renderForm} from "./scripts/form.js";
import { switchButton } from "./scripts/switchButton.js";
import {userModification} from "./scripts/userModification";
import {characterCounter} from "./scripts/characterCounter.js";
import {savedChangesStatus} from "./scripts/savedChangesStatus.js";

ckeditor();
cleanConfirmation();
menuButton();
tabs();
localeTabs();
renderForm();
switchButton();
userModification();
characterCounter();
savedChangesStatus();