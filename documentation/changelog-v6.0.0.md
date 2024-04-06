### Version 6.0.0


#### 06.04.2024
- fix: Header cat list overflow
        => Regular css finder and remove
        => unnecessary js and css remove
        => Optimize the css and js
        => Inline css intigration
        => inline js intigration
- Fix: Style 3 header hyper link target blank
- Feature: Auto Update System
        => License saving to db
        => password protection while updating
        => Private key system auto update
        => Lara Optmize shell in update system
        => feature: condition based git pull
        => PHP info checker added to system update
        => if php shell exec off notice auto in update page
- Fix: Vendor list only showed 10 now showing paginate
- Fix: Vendor product list all render product off now show per request
- Fix: Vendor and and vendor prouducts are now show by paginate request not all render at a time
        


#### 05.04.2024
- Fix: Home page spacer combined
- DB: Optimize
- DB: new version backup 5.8.1
- Fix: Style 3 header cateogry z-index solve for floating
- feature: shell update system menu added

#### 04.04.2024
- Feature: Header Styule 3 Added
- This header transparent the result body and without search it will not impact on main content
- Feature: in Header Style 3 also transparent

#### 02.04.2024
- Fix: Dynamic phone number digit login allow
- Fix: Single product page variation switcher
- Fix: Filter - reConfigured for better performence als while debug
        => Color System
        => Atrribute Sytem
        => Brand System
        => MultiBrand System
        => All Category
        => Pricing Sliding
        => Pricing Different
        => Discount Different
        => Pricing ASC/DSC
        => Discount ASC/DSC
        
#### 01.04.2024
- Fix: Single product page formatted reduce the whitespace
- Fix: Placeholder image issue
- Fix: Single prodcut JS Issue, this problem was make for multiple currency formate
- Cng: Phone number level for max/min
- Single Page stock notice BN/EN base on country
- Break: Database operation break, chnage the users table email column nullable
- Cng: Menu rarrange the SMS | Mail below of shop settings menu
- Break: Registration form phone number dynamic number digit
- Break: M ail sms config page rewrite and controller calling reduce the opration for complexity
- Cng: Registration time email optional or unfillable allow while register
- Feture: If SMS config status is true then register time OTP is required else not

#### 31.03.2024
- Fix: Filter category and mini category
- Fix: Filter Pricing level forntend just
- Fix: Filter with product attibutes frontend only
- Fix: JS Issue Filter system

#### 25.03.2024
- Feature: Checkout time phone number allocation and dynamically found the digit limit
- Feature: Shop Setting page dynamically changable the digit of 
- Fix: Product grid view all small custom message hidden by condition based
- Fix: Minimal checkout double amount problem solved
- Fix: Page status checked and saving issue solved

#### 24.03.2024
- fix: only main catagory filter fixes
- !fix: product all filter
- App link conditionally visible to footer column 4 while fillable to dashboard
- Feature: Dynamic the Android App link
- Fix: Column 1 footer description visible

#### 21.03.2024
- Database raltion break for product page
- Guildline added to product add page for image optimization
- Change the laravel products showign controller - "$products = Product::with('brand')->latest('id')->paginate(10);"
- Feature: Add default laravel pagination
- Fix: If the products/All products showing this time loading all of products in single time with single request Fix 

#### Dynamic thoses color name
- Breack: #108b3a > primary color
- Breack: #007bc4 > optional_color > #00aa3a

