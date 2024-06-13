const translations = {
  en: {
    header: {
      desktop: "adesktop",
      product: "product",
      product_managment: "Product Managment",
      Inventory_setting: "Inventory Settings",
      cupons_benefit: "coupns and Benefits",
      customerss: "customer",
      Transaction: "Transaction",
      objective: "Objectives",
      optimizing: "Optimization",
      support: "Support",
      Setting: "Setting",
      Help: "Help and support",
      Disconecting: "Disconnecting from the system ",
      Logout : "Logout",
    },
    dashboard: {
      tabs: {
        first_tab: "24 Hours",
        second_tab: "Last Week",
        third_tab: "Last Month",
        fourth_tab: "Last Year",
        filter_btn: "Filter by dates ",
      },
      card_product: {
        card_title: "New Products",
        customer_location: "Customer Location",
        card_num: "647",
        card_percentage: "10%",
        card_num_label: "Last 7 Days",
      },
      card_arrivals: {
        card_title: "Arrivals",
        card_num: "1457",
        card_percentage: "10%",
        card_num_label: "Last 7 Days",
      },
      card_customers: {
        card_title: "New Customers",
        card_num: "127",
        card_percentage: "10%",
        card_num_label: "Last 7 Days",
      },
      card_transaction: {
        card_title: "Total Transaction",
        card_num: "12,500 NIS",
        card_percentage: "10%",
        card_num_label: "Last 7 Days",
      },
      img_like_blue_bg_data: {
        text: "Tell us what additional data you would like to have on your desktop",
      },
      grid_images_in_last: {
        row_left_data: "For All Products",
        row_right_data: "The Best Selling Products",
      },
      last_table_data: {
        table_data_one_on_left: "For All Orders",
        table_data_one_on_right: "Last Orders",
      },
      last_table_tr_first: {
        td_one: "ORDER NO",
        td_two: "CLIENT",
        td_three: "DATE",
        td_four: "SUM",
      },
      last_table_tr_second: {
        td_one: "24452#",
        td_two: "Simcha",
        td_three: "12/06/23E",
        td_four: "NIS",
      },
      last_table_tr_third: {
        td_one: "72.65%",
        td_two: "2,865",
        td_three: "3,256",
        td_four: "to order",
      },
      last_table_tr_fourth: {
        td_one: "24452#",
        td_two: "Cohen",
        td_three: "12/06/23",
        td_four: "149.50",
      },
    },
    product_managment: {
      nav: {
        new_product_btn: "Add a new product +",
        category_product_btn: "Category management",
        future_product_btn: "Feature management",
        excel_product_btn: "Import/Export From Excel",
      },
      product_search: {
        serach_product_bar_placeholder: "Product search",
        filter_inventory_btn: "Filter by inventory",
        filter_catageary_btn: "Filter by category",
      },
      row: {
        product_name: "Product name:",
        category: "Category: bags",
        Price: "Price:",
        Stock: "Stock: 150",
        Number_of_view: "Number of views:",
      },
    },
    inventtory_setting: {
      main_heading: {
        h1: "General inventory settings",
      },
      first_row_with_check_box: {
        managment: "Enabling inventory management",
      },
      second_row_with_check_box: {
        stock_alert_low: "Activating an alert when stock is low",
      },
      third_row_with_check_box: {
        stock_alert_out: "Activate out of stock alert",
        productpage: {
          productname: "Product name",
          category: "Category",
          price: "Price",
          Stock: "Stock",
        },
      },


      fourth_row_with_check_box: {
        email_label: "Email address to receive notifications..",
        data: "Email address to receive notifications",
        quantity: "Threshold quantity out of stock",
      },
      extra_fourth_row_with_check_box: {
        last_div_ip: "Threshold quantity out of stock",
      },
      fifth_row_with_check_box: {
        email_placeholder_P: "Threshold quantity for low stocks",
      },
      sixth_row_with_check_box: {
        update_btn: "Updating and saving inventory settings →",
      },
    },
    cupons_and_benifit: {
      search_bar: {
        coupon_search_placeholder: "Coupon search",
        add_new_coupon_btn: "Added a new coupon +",
      },
      coupons_th: {
        Coupon_Code_in_th: "Coupon Code",
        coupon_type_in_th: "Coupon Type",
        Discount_amount_in_th: "Discount Amount",
        Use_restriction_in_th: "Use/Restriction",
        Expiry_Date_in_th: "Expiry Date",
        action_in_th: "Action",
      },
      coupons_tr: {
        coupon_code_tr_in_td: "purim054",
        coupon_type_tr_in_td: "A fixed discount",
        discount_amount_tr_in_td: "20%",
        use_tr_in_td: "8/4",
        expiry_date_tr_in_td: "03/24/2022",
      },
    },
    customer_page: {
      customer_search: {
        search: "Customer search",
      },
      customer_th: {
        customer_name: "Customer's name",
        dates_name: "Date of last order",
        mails_name: "mail address",
        number_name: "Number of orders",
        total_name: "Total",
        order_name: "Order average",
      },
      customer_tr: {
        customer_name: "mubashir Malka",
        dates_name: "24/07/2024",
        mails_name: "elikako.m@gmail.com ",
        number_name: "Number of orders",
        total_name: " NIS 1,370",
        order_name: "685 NIS ",
      },
    },
    transction_page: {
      transaction_search: {
        search_text: "Order Search",
      },
      transaction_th: {
        order_no: "order no",
        customer_name: "Customer's name",
        status: "Status",
        order_date: "Order Date",
        sum: "sum",
        source: "source",
      },
      transaction_tr: {
        customer_name: "Client's Name",
        Phone_Number: "Phone Number",
        Email_address: "Email Address",
      },

      status_tr: {
        Complete: "Complete",
        In_Treatment: "In Treatment",
        Cancelled: "Cancelled",
        changed: "Group status change",
      },
    },
    statististics: {
      tabs_in_static: {
        tab_overview: "Overview",
        tab_Products: "Products",
        tab_Revenues: "Revenues",
        tab_Orders: "Orders",
      },
      tabs_in_select_range: {
        week: "Last Week",
        month: "Current Month",
        year: "Last Year",
        button: "Select a date range",
      },
      cards_in_overview: {
        "it is only for tab 1 all card number": "",
        num_h1_card_customer_title: "150",
        crad_text_blue_in_card_customer: "New Customer",
        crad_text_blue_in_card_returing: "Returning Customer",
        crad_text_blue_in_card_product: "Product",
        crad_text_blue_in_card_order: "Order",
        crad_text_blue_in_card_revenue: "Revenue",
      },
      cards_in_product: {
        product_tab_in_static: {
          card1_in_product: {
            card_product: "450",
            normal_product: "Product",
          },
          card2_in_normal_product: {
            card_product_normal: "450",
            normal_product_in_card2: "Normal Products",
          },
          card3_in_Sale: {
            card_product_sale: "250",
            normal_product: "Product On Sale",
          },
          card4_in_product: {
            card_product: "250",
            normal_product: "Order",
          },
          card5_in_product: {
            card_product: "15",
            normal_product: "Products on order",
          },
        },
      },
      cards_in_Revenues: {
        product_tab_in_static: {
          card1_in_product: {
            card_product: "15,450 NIS",
            normal_product: "Revenues",
          },
          card2_in_normal_product: {
            card_product_normal: "NIS 2,450",
            normal_product_in_card2: "Rehearsals",
          },
          card3_in_Sale: {
            card_product_sale: "3,450 NIS",
            normal_product: "Order average",
          },
          card4_in_product: {
            card_product: "250",
            normal_product: "Order",
          },
          card5_in_product: {
            card_product: "15",
            normal_product: "Products on order",
          },
        },
      },
      cards_in_orders: {
        card1_in_product: {
          card_product: "850",
          normal_product: "Order",
        },
        card2_in_normal_product: {
          card_product_normal: "15,450 NIS",
          normal_product_in_card2: "Total Revenue",
        },
        card3_in_Sale: {
          card_product_sale: "450 NIS",
          normal_product: "Order Average",
        },
        card4_in_product: {
          card_product: "15",
          normal_product: "Average items",
        },
        card5_in_product: {
          card_product: "350",
          normal_product: "Customers",
        },
      },
      chart_below_btn: {
        firts_btn: {
          text: "New Customers",
        },
        second_btn: {
          text: "Customers",
        },
        third_btn: {
          text: "Product",
        },
        fourth_btn: {
          text: "New Order",
        },
        five_btn: {
          text: "New Revenues",
        },
      },
    },
    objective: {
      top_section_like_nav: {
        text_hading: "Business goals and objectives",
        paragraph_heading:
          "You should set goals, it's challenging and addicting and causes sales to increase.",
        button: "Goal Setting",
      },
      card_one_in_objective: {
        card_title: "in sales",
        card_one_p_left: "NIS",
        card_tag_p_right: "left",
      },
      card_two_in_objective: {
        card_title: "Recruit",
        card_one_p_left: "New customers",
        card_tag_p_right: "Customers were recruited",
      },
      card_three_in_objective: {
        card_title: " customers left",
        card_one_p_left: "new orders",
        card_tag_p_right: "were accepted",
      },
      card_four_in_objective: {
        card_title: "page views",
        card_one_p_left: " were accepted",
        card_tag_p_right: "0 left",
        well_done: "Well done",
      },
      card_five_in_objective: {
        title: "Advance",
        card_one_p_left: "Positions on Google",
        card_tag_p_right: "You advanced",
      },
      card_six_in_objective: {
        card_title: "Posotions",
        card_one_p_left: "Locations left",
        card_tag_p_right: "Added",
      },
      card_seven_in_objective: {
        card_title: "new keywords",
        card_one_p_left: "keywords left",
        card_tag_p_right: "Add ",
      },
      card_eight_in_objective: {
        card_title: "new products",
        card_one_p_left: "products left",
        card_tag_p_right: "  increase in average items",
      },
      card_nine_in_objective: {
        card_title: "  in the average order",
        card_one_p_left: "rose by 0 NIS",
        card_tag_p_right: "An increase of NIS",
      },
    },
    popoups: {
      add_new_type: {
        heading: "Choose the type of product",
        variation: "A product with variations",
        new_product: "normal product",
      },
      add_new_product_popoup: {
        adding_new_product: "Adding a new product and variations",
        normal_product: "Adding a new regular product",
        product_name_input: "Product Name",
        catageory_managment: "Category",
        image_upload: "Upload a product image",
        image_upload_text: " Choose a picture",
        gallery_upload: "Upload a photo gallery",
        gallery_upload_text: "Select images",
        text_area_text: "A brief description of the product",
        select_area_text: "Select an attribute for product variations",
        added_new_term_btn: "Added terms for variations",
        name_of_term: "Name of  Term",
        term_price: "Normal Price",
        saleprice: "Sale price (optional)",
        select_term: "Select Term Attribute",
        unit: "unit in stock",
        term_inventory: "Term inventory",
        adding_btn_variation: "Adding an additional term to + variations",
      },
      add_new_catageory: {
        catageory_search: "Category search",
        catageory_btn: "Added a new category +",
        th_in_catageory: {
          th_img: "image",
          th_catageory: "Name of the category",
          th_parent: "Parent category",
          th_quantity: "Quantity of products",
        },
        tr_new_catagary: {
          th_img: "",
          th_catageory: "nooob chain",
          th_parent: "special designs",
          th_quantity: "45",
        },
        popoup_in_catagory: {
          heading: "Added a new category",
          heading_for_edit: "Editing a category",
          label_key: "Name of Category",
          label_parent_ct: "Parent category",
          label_up_img: "Uploading a picture",
          select_img_text: " Selecting an image",
          catageory_btn2: "To Update the Category click here +",
        },
        edit_catageory: {},
      },
      future_managment: {
        feature_search: "Category term",
        feature_btn: "Added a new feature +",
        term_btn: "Added a new term +",
        th_in_feture: {
          th_action: "action",
          th_type: "display type",
          th_product: "product",
          th_term: "associated feature",
          th_name_term: "the name of term",
          th_color: "Image/color",
        },
        tr_new_catagary: {
          th_action: "",
          th_type: "selection field",
          th_product: "15",
          th_term: "atif colors",
          th_name_term: "#pink",
          th_color: "",
        },
        add_new_feature: {
          heading: "Added a new feature",
          heading_for_edit: "",
          color_select_atr: "Attribute Name",
          d_type: "Display Type (Color/Image)",
          hero_heading: "Adding terms to the feature",
          name_of_term: "Name of the term",
          select_img_uplode: "Selecting an image",
          select_color: "Color change",
          term_end_btn: "To add another term click here +",
          add_new_term_feature: {
            card_selection: {
              h1: "Selection Field",
              h2: "Rounded Edges",
              h3: "rounded edges (image)",
              h4: "radio buttons (image)",
            },
            card_Radio_buttons: {
              h1: "Radio buttons",
              sizes: {
                XL: "xl",
                L: "L",
                M: "xl",
                S: "xl",
              },
            },
            card_Rounded_edges: {
              h1: "Selection Field",
              sizes: {
                XL: "xl",
                L: "L",
                M: "xl",
                S: "xl",
              },
            },
            last_btn_feature: "To add fetaure click here+",
          },
        },
        add_new_term: {
          heading: "Adding a new term",
          heading_for_edit: "Bring In NIS",
          name_of_term: "Name of the term",
          feature: "associated feature",
          error_alert: "Choosing a color for the display of the term",
          name_of_term_pink: "Name of Term",
          d_term: "Selecting an image to display the term",
          select_img_uplode: "Selecting an image",
          select_color: "Color change",
          term_end_btn: "To add another term click here +",
          term_end_submit_btn: "this is the submit button",
        },
        edit_variation_in_product_managment: {
          heading: "Editing a product with variations",
          normal_product: "",
          product_name_input: "Product Name",
          catageory_managment: "Category",
          image_upload: "Upload a product image",
          image_upload_text: " Choose a picture",
          gallery_upload: "Upload a photo gallery",
          gallery_upload_text: "Select images",
          th_in_variation: {
            th_img: "Image/color",
            th_term: "Name of Term",
            th_price: "Horace Price",
            th_inventory: "Horace inventory",
          },
          variation_tr: {
            tr_img: "",
            tr_term: "pink",
            tr_price: "250 NIS",
            tr_inventory: "15",
          },
          btn_addiotainal_term: "Adding an additional term to + variations",
          text_area_text: "A brief description of the product",
          select_area_text: "Select an attribute for product variations",
          update_product_btn: "To update the Product",
          delete_product_btn: "Deletion the Product",
          edit_term: {
            heading: "Edit Term",
            label_term: "Name of term",
            label_feature: "Associated feature",
            color_label: "Color change",
            last_btn: "To update term click here+",
          },
        },
      },
      added_new_cupons: {
        heading: "Added a new coupon",
        heading_edit: "Editing an existing coupon",
        discount_type: "Discount type (amount/percentage)",
        cupon_code: "Coupon code",
        amounth_discount: "Amount of Discount",
        expiry_date: "Coupon expiration date",
        limit: "Usage limit (leave blank without limit)",
        last_btn_cat: "To add the category click here+",
        last_btn_coupon: "To update the coupon click here+",
      },
      transction_pop_popuop: {
        order_detail: {
          heading: "Order details #1152",
          client_info: "Customer details and shipping address",
          Cl_name: "Client's name: Eliyahu Malka",
          Pone: "Phone number: 054-6268012",
          mail: "Email address: elikako.m@gmail.com",
          order_status: "Change order status",
          card_adress: {
            adress: "Shipping Address",
            adress_detail:
              "Kibbutz Galuyot 12, apartment 8, floor 10, Bnei Brak,",
          },
          Order_detail: "Order Details",
          th: {
            item_name: "Item name",
            cst: "Cost",
            amt: "Amount",
            total: "Total",
          },
          tr: {
            item_name: " Samsung Galaxy S24",
            cst: "4,500 NIS",
            amt: "250 NIS",
            total: "15",
          },
          card_order: {
            total_cost: "Total cost of order",
            product: "Products: NIS",
            delivery: "Delivery up to 5 business days: NIS",
            total: "Order date:",
            total_cost: "Total Cost : NIS",
          },
          last_btn: "Save changes",
        },
      },
      static_popoup: {
        date_range: {
          date_heading: "Select a Date Range",
          start_date: "Start Date",
          To_date: "To Date",
          search: "searh",
        },
      },
      objective_popoup: {
        heading: "Definitions of goals and objectives",
        target: "Target sales revenue",
        target_recuriment: "Target recruitment of new customers",
        destination: "Destination of new orders",
        target_view_page: "Target page views",
        target_progress_view_page: "Target progress in Google locations",
        target_page_view_page: "Target page views",
        target_new_view_page: "Target new products",
        target_increase_view_page:
          "Target to increase the average number of items per order (%)",
        goal_view_page: "Goal of raising the average income from the order",
        update_btn_last: "Update",
      },
      delete_popoup: {
        text: "Are you sure you want to delete the category?",
        delete: "Delete",
        cancel: "cancel",
      },
    },
  },
  he: {
    header: {
      desktop: "שולחן עבודה",
      product: "מוצר",
      product_managment: "ניהול מוצרים",
      Inventory_setting: "הגדרות מלאי",
      cupons_benefit: "קופונים והטבות",
      customerss: "לקוחות",
      Transaction: "עסקאות",
      objective: "מטרות",
      optimizing: "אופטימיזציה",
      support: "תמיכה",
      Setting: "הגדרות",
      Help: "עזרה ותמיכה",
      Disconecting: "ניתוק מהמערכת",
      Logout : "להתנתק",
    },
    dashboard: {
      tabs: {
        first_tab: "24 שעות",
        second_tab: "שבוע שעבר",
        third_tab: "חודש שעבר",
        fourth_tab: "שנה שעברה",
        filter_btn: "סנן לפי תאריכים ",
      },
      card_product: {
        customer_location: "מיקום_לקוח",
        card_title: "מוצרים חדשים",
        card_num: "647",
        card_percentage: "10%",
        card_num_label: "7 הימים האחרונים",
      },
      card_arrivals: {
        card_title: "הגעות",
        card_num: "1457",
        card_percentage: "10%",
        card_num_label: "7 הימים האחרונים",
      },
      card_customers: {
        card_title: "לקוחות חדשים",
        card_num: "127",
        card_percentage: "10%",
        card_num_label: "7 הימים האחרונים",
      },
      card_transaction: {
        card_title: 'סה"כ עסקאות',
        card_num: '12,500 ש"ח',
        card_percentage: "10%",
        card_num_label: "7 הימים האחרונים",
      },
      img_like_blue_bg_data: {
        text: "ספרו לנו איזה נתונים נוספים תרצו לראות על שולחן העבודה שלכם",
      },
      grid_images_in_last: {
        row_left_data: "עבור כל המוצרים",
        row_right_data: "המוצרים הנמכרים ביותר",
      },
      last_table_data: {
        table_data_one_on_left: "עבור כל ההזמנות",
        table_data_one_on_right: "ההזמנות האחרונות",
      },
      last_table_tr_first: {
        td_one: "מס' הזמנה",
        td_two: "לקוח",
        td_three: "תאריך",
        td_four: "סכום",
      },
      last_table_tr_second: {
        td_one: "24452#",
        td_two: "שמחה",
        td_three: "12/06/23E",
        td_four: 'ש"ח',
      },
      last_table_tr_third: {
        td_one: "72.65%",
        td_two: "2,865",
        td_three: "3,256",
        td_four: "להזמין",
      },
      last_table_tr_fourth: {
        td_one: "24452#",
        td_two: "כהן",
        td_three: "12/06/23",
        td_four: "149.50",
      },
    },
    product_managment: {
      nav: {
        new_product_btn: "הוסף מוצר חדש +",
        category_product_btn: "ניהול קטגוריות",
        future_product_btn: "ניהול תכונות",
        excel_product_btn: "יבוא/יצוא מ-Excel",
      },
      product_search: {
        serach_product_bar_placeholder: "חיפוש מוצר",
        filter_inventory_btn: "סינון לפי מלאי",
        filter_catageary_btn: "סינון לפי קטגוריה",
      },
      row: {
        product_name: "שם המוצר: תיק גוצ'י ירוק",
        category: "קטגוריה: תיקים, מותגים",
        Price: 'מחיר: 250 ש"ח',
        Stock: "מלאי: 150",
        Number_of_view: "מספר צפיות: 250",
      },
    },
    inventtory_setting: {
      main_heading: {
        h1: "הגדרות כלליות של המלאי",
      },
      first_row_with_check_box: {
        managment: "הפעלת ניהול מלאי",
      },
      second_row_with_check_box: {
        stock_alert_low: "הפעלת התראה כאשר המלאי נמוך",
      },
      third_row_with_check_box: {
        stock_alert_out: "הפעלת התראת אזל מלאי",
        productpage: {
          productname: "",
          category: "קטגוריה",
          price: "מחיר",
          Stock: "המניה",
        },
      },

      fourth_row_with_check_box: {
        email_label: "כתובת אימייל לקבלת התראות.. ",
        data: "כתובת אימייל לקבלת התראות ",

        quantity: "כמות אחזקה שאינה במלאי ",
      },
      extra_fourth_row_with_check_box: {
        last_div_ip: "כמות אחזקה שאינה במלאי ",
      },
      fifth_row_with_check_box: {
        email_placeholder_P: "כמות אחזקה נמוכה להפעלת הערך המינימלי",
      },
      sixth_row_with_check_box: {
        update_btn: "עדכון ושמירת הגדרות המלאי →",
      },
    },
    cupons_and_benifit: {
      search_bar: {
        coupon_search_placeholder: "חיפוש קופון",
        add_new_coupon_btn: "הוספת קופון חדש +",
      },
      coupons_th: {
        Coupon_Code_in_th: "קוד קופון",
        coupon_type_in_th: "סוג קופון",
        Discount_amount_in_th: "סכום הנחה",
        Use_restriction_in_th: "שימוש/הגבלה",
        Expiry_Date_in_th: "תאריך תפוגה",
        action_in_th: "פעולה",
      },
      coupons_tr: {
        coupon_code_tr_in_td: "purim054",
        coupon_type_tr_in_td: "הנחה קבועה",
        discount_amount_tr_in_td: "20%",
        use_tr_in_td: "8/4",
        expiry_date_tr_in_td: "03/24/2022",
      },
    },
    customer_page: {
      customer_search: {
        search: "חיפוש לקוח",
      },
      customer_th: {
        customer_name: "שם הלקוח",
        dates_name: "תאריך ההזמנה האחרונה",
        mails_name: "כתובת אימייל",
        number_name: "מספר הזמנות",
        total_name: "סכום כולל",
        order_name: "ממוצע הזמנה",
      },
      customer_tr: {
        customer_name: "מובשר מלכא",
        dates_name: "תאריך ההזמנה האחרונה",
        mails_name: "כתובת אימייל",
        number_name: "מספר הזמנות",
        total_name: 'סה"כ',
        order_name: "ממוצע הזמנה",
      },
    },
    transction_page: {
      transaction_search: {
        search_text: "חיפוש הזמנה",
      },
      transaction_th: {
        order_no: "מספר הזמנה",
        customer_name: "שם הלקוח",
        status: "סטטוס",
        order_date: "תאריך הזמנה",
        sum: "סכום",
        source: "מקור",
      },
      transaction_tr: {
        customer_name: "שם הלקוח",
        Phone_Number: "מספר טלפון",
        Email_address: 'כתובת דוא"ל',
      },

      status_tr: {
        Complete: "לְהַשְׁלִים",
        In_Treatment: "בטיפול",
        Cancelled: "מבוטל",
        changed: "שינוי סטטוס הקבוצה",
      },
    },
    statististics: {
      tabs_in_static: {
        tab_overview: "מבט כללי",
        tab_Products: "מוצרים",
        tab_Revenues: "הכנסות",
        tab_Orders: "הזמנות",
      },
      tabs_in_select_range: {
        week: "השבוע האחרון",
        month: "חודש נוכחי",
        year: "שנה שעברה",
        button: "בחירת טווח תאריכים",
      },
      cards_in_overview: {
        "it is only for tab 1 all card number": "",
        num_h1_card_customer_title: "150",
        crad_text_blue_in_card_customer: "לקוחות חדשים",
        crad_text_blue_in_card_returing: "לקוחות קיימים",
        crad_text_blue_in_card_product: " מוצרים",
        crad_text_blue_in_card_order: " הזמנות",
        crad_text_blue_in_card_revenue: "הכנסות",
      },
      cards_in_product: {
        product_tab_in_static: {
          card1_in_product: {
            card_product: "450",
            normal_product: "מוצרים",
          },
          card2_in_normal_product: {
            card_product_normal: "450",
            normal_product_in_card2: "מוצרים רגילים",
          },
          card3_in_Sale: {
            card_product_sale: "250",
            normal_product: "מוצרים במבצע",
          },
          card4_in_product: {
            card_product: "250",
            normal_product: "הזמנה",
          },
          card5_in_product: {
            card_product: "15",
            normal_product: "מוצרים בהזמנה",
          },
        },
      },
      cards_in_Revenues: {
        product_tab_in_static: {
          card1_in_product: {
            card_product: '15,450 ש"ח',
            normal_product: "רווחים",
          },
          card2_in_normal_product: {
            card_product_normal: '2,450 ש"ח',
            normal_product_in_card2: "הכנסות חודשיות",
          },
          card3_in_Sale: {
            card_product_sale: '3,450 ש"ח',
            normal_product: "ממוצע הזמנה",
          },
          card4_in_product: {
            card_product: "250",
            normal_product: "הזמנה",
          },
          card5_in_product: {
            card_product: "15",
            normal_product: "מוצרים בהזמנה",
          },
        },
      },
      cards_in_orders: {
        card1_in_product: {
          card_product: "850",
          normal_product: "הזמנה",
        },
        card2_in_normal_product: {
          card_product_normal: '15,450 ש"ח',
          normal_product_in_card2: "סך כל הרווח",
        },
        card3_in_Sale: {
          card_product_sale: '450 ש"ח',
          normal_product: "ממוצע הזמנה",
        },
        card4_in_product: {
          card_product: "15",
          normal_product: "פריטים ממוצעים",
        },
        card5_in_product: {
          card_product: "350",
          normal_product: "לקוחות",
        },
      },
      chart_below_btn: {
        firts_btn: {
          text: "לקוחות חדשים",
        },
        second_btn: {
          text: "לקוחות",
        },
        third_btn: {
          text: "מוצר",
        },
        fourth_btn: {
          text: "הזמנה חדשה",
        },
        five_btn: {
          text: "הכנסה חדשה",
        },
      },
    },
    objective: {
      top_section_like_nav: {
        text_hading: "יעדים ומטרות עסקיות",
        paragraph_heading:
          "כדאי לכם לקבוע יעדים, זה מאתגר וממכר וגורם להגדלת המכירות.",
        button: "קביעת מטרות",
      },
      card_one_in_objective: {
        card_title: "במכירות",
        card_one_p_left: ' ש"ח',
        card_tag_p_right: "נותרו",
      },
      card_two_in_objective: {
        card_title: "לגיס",
        card_one_p_left: "ניו קוסטומר",
        card_tag_p_right: "קוסטומר וירה רקרואיטד",
      },
      card_three_in_objective: {
        card_title: "קוסטומר לפט",
        card_one_p_left: "ניו הוראות",
        card_tag_p_right: "וירה אקפטד",
      },
      card_four_in_objective: {
        card_title: "צפיות בדף",
        card_one_p_left: "התקבלו",
        card_tag_p_right: "0 נותרו",
      },
      card_five_in_objective: {
        title: "התקדם",
        card_one_p_left: " מיקומים בגוגל",
        card_tag_p_right: "התקדמת ",
      },
      card_six_in_objective: {
        card_title: "תפקידים",
        card_one_p_left: "מיקומים שנותרו",
        card_tag_p_right: "נוסף",
      },
      card_seven_in_objective: {
        card_title: "מילות מפתח חדשות",
        card_one_p_left: "מילות מפתח שנותרו",
        card_tag_p_right: "הוסף",
      },
      card_eight_in_objective: {
        card_title: "מוצרים חדשים",
        card_one_p_left: "מוצרים שנותרו",
        card_tag_p_right: "  עלייה בממוצע הפריטים",
      },
      card_nine_in_objective: {
        card_title: "בסדר הממוצע",
        card_one_p_left: 'גבתה ב-0 ש"ח',
        card_tag_p_right: "   עלייה של שקלים",
      },
    },
    popoups: {
      add_new_type: {
        heading: "בחרו את סוג המוצר",
        variation: "מוצר עם שינויים",
        new_product: "מוצר רגיל",
      },
      add_new_product_popoup: {
        adding_new_product: "הוספת מוצר וראציות חדש",
        normal_product: "הוספת מוצר רגיל חדש",
        product_name_input: "שם המוצר",
        catageory_managment: "קטגוריה",
        image_upload: "בחר/י תמונה",
        image_upload_text: "בחר/י תמונות",
        gallery_upload: "העלאת גלריית תמונות",
        gallery_upload_text: "בחירת תמונות",
        saleprice: "מחיר מבצע",
        select_term: "בחר מאפיין מונח",
        unit: "יחידות במלאי",
        text_area_text: "תיאור קצר של המוצר",
        select_area_text: "בחירת מאפיין לשינויים במוצר",
        added_new_term_btn: "הוספת מונחים לשינויים",
        name_of_term: "שם המונח",
        term_price: "מחיר רגיל",
        saleprice: "מחיר מבצע ( לא חובה )",
        term_inventory: "מלאי המונח",
        adding_btn_variation: "הוספת מונח נוסף ל+ שינויים",
      },
      add_new_catageory: {
        catageory_search: "חיפוש קטגוריה",
        catageory_btn: "הוספת קטגוריה חדשה +",
        th_in_catageory: {
          th_img: "תמונה",
          th_catageory: "שם הקטגוריה",
          th_parent: "קטגוריית אב",
          th_quantity: "כמות המוצרים",
        },
        tr_new_catagary: {
          th_img: "",
          th_catageory: "שרשרת חדשה",
          th_parent: "עיצובים מיוחדים",
          th_quantity: "45",
        },
        popoup_in_catagory: {
          heading: "הוספת קטגוריה חדשה",
          heading_for_edit: "הביאו ₪",
          label_key: "שם הקטגוריה",
          label_parent_ct: "קטגורית הורה",
          label_up_img: "העלאת תמונה",
          select_img_text: "בחירת תמונה",
          catageory_btn: "להוספת הקטגוריה לחצו כאן +",
        },
        edit_catageory: {},
      },
      future_managment: {
        feature_search: "חיפוש מאפיינים",
        feature_btn: "הוספת מאפיין חדש +",
        term_btn: "הוספת מונח חדש +",
        th_in_feture: {
          th_action: "פעולה",
          th_type: "סוג תצוגה",
          th_product: "מוצרים",
          th_term: "תכונה משוייכת",
          th_name_term: "שם המונח",
          th_color: "תמונת/צבע  המונח",
        },
        tr_new_catagary: {
          th_action: "",
          th_type: "שדה בחירה",
          th_product: "15",
          th_term: "צבעי atif",
          th_name_term: "#ורוד",
          th_color: "",
        },
        add_new_feature: {
          heading: "הוספת תכונה חדשה",
          heading_for_edit: "",
          color_select_atr: "שם התכונה",
          d_type: "סוג תצוגה (צבע/תמונה)",
          hero_heading: "הגדרות נראות  וראציות",
          name_of_term: "שם המונח",
          select_img_uplode: "בחירת תמונה",
          select_color: "שינוי צבע",
          term_end_btn: "להוספת מונח נוסף לחצו כאן +",
          add_new_term_feature: {
            card_selection: {
              h1: "שדה בחירה",
              h2: "קצוות מעוגלים",
              h3: "קצוות מעוגלים (תמונה)",
              h4: "כפתורי רדיו (תמונה)",
            },
            card_Radio_buttons: {
              h1: "קצוות מעוגלים",
              sizes: {
                XL: "XL",
                L: "L",
                M: "M",
                S: "S",
              },
            },
            card_Rounded_edges: {
              h1: "שדה בחירה",
              sizes: {
                XL: "XL",
                L: "L",
                M: "M",
                S: "S",
              },
            },
            last_btn_feature: "להוספת מאפיין לחצו כאן +",
          },
        },
        add_new_term: {
          heading: "הוספת מונח חדש",
          heading_for_edit: "",
          name_of_term: "שם המונח",
          feature: "תכונה משוייכת ",
          error_alert: "בחירת צבע לתצוגת המונח",
          name_of_term_pink: "שם המונח",
          d_term: "בחירת תמונה לתצוגת המונח",
          select_img_uplode: "בחירת תמונה",
          select_color: "שינוי צבע",
          term_end_btn: "להוספת מונח נוסף לחצו כאן +",
          term_end_submit_btn: "לחצן לשמירת המונח",
        },
        edit_variation_in_product_managment: {
          heading: "עריכת מוצר עם שינויים",
          normal_product: "",
          product_name_input: "שם המוצר",
          catageory_managment: "קטגוריה",
          image_upload: "העלאת תמונת מוצר",
          image_upload_text: "בחירת תמונה",
          gallery_upload: "העלאת גלריית תמונות",
          gallery_upload_text: "בחירת תמונות",
          th_in_variation: {
            th_img: "תמונה/צבע",
            th_term: "שם המונח",
            th_price: "מחיר מחיר",
            th_inventory: "מלאי",
          },
          variation_tr: {
            tr_img: "",
            tr_term: "ורוד",
            tr_price: '250 ש"ח',
            tr_inventory: "15",
          },
          btn_addiotainal_term: "הוספת מונח נוסף ל+ שינויים",
          text_area_text: "תיאור קצר של המוצר",
          select_area_text: "בחירת מאפיין לשינויים במוצר",
          update_product_btn: "לעדכון המוצר",
          delete_product_btn: "מחיקת המוצר",
          edit_term: {
            heading: "עריכת מונח",
            label_term: "שם המונח",
            label_feature: "מאפיין משויך",
            color_label: "שינוי צבע",
            last_btn: "לעדכון המונח לחצו כאן+",
          },
        },
      },
      added_new_cupons: {
        heading: "הוספת קופון חדש",
        heading_edit: "עריכת קופון קיים",
        discount_type: "סוג הנחה (סכום/אחוז)",
        cupon_code: "קוד הקופון",
        amounth_discount: "סכום ההנחה",
        expiry_date: "תאריך תפוגה של הקופון",
        limit: "מגבלת שימוש (השאירו ריק ללא הגבלה)",
        last_btn_cat: "להוספת הקטגוריה לחצו כאן+",
        last_btn_coupon: "לעדכון הקופון לחצו כאן+",
      },
      transction_pop_popuop: {
        order_detail: {
          heading: "פרטי הזמנה #1152",
          client_info: "פרטי הלקוח וכתובת המשלוח",
          Cl_name: "שם הלקוח: אליהו מלכה",
          Pone: "מספר טלפון: 054-6268012",
          mail: 'כתובת דוא"ל: elikako.m@gmail.com',
          order_status: "שינוי סטטוס ההזמנה",
          card_adress: {
            adress: "כתובת למשלוח",
            adress_detail: "קיבוץ גלויות 12, דירה 8, קומה 10, בני ברק",
          },
          Order_detail: "פרטי הזמנה",
          th: {
            item_name: "שם הפריט",
            cst: "עלות",
            amt: "כמות",
            total: "סך הכל",
          },
          tr: {
            item_name: "Samsung Galaxy S24",
            cst: '4,500 ש"ח',
            amt: '250 ש"ח',
            total: "15",
          },
          card_order: {
            total_cost: "עלות כוללת של ההזמנה",
            product: 'מוצרים: 10,450 ש"ח',
            delivery: 'משלוח עד 5 ימי עסקים: 39.9 ש"ח',
            total: "תאריך הזמנה:",
            total_cost: "עלות כוללת  : NIS",
          },
          last_btn: "שמירת השינויים",
        },
      },
      static_popoup: {
        date_range: {
          date_heading: "בחירת טווח תאריכים",
          start_date: "תאריך התחלה",
          To_date: "תאריך סיום",
          search: "חיפוש",
        },
      },
      objective_popoup: {
        heading: "הגדרת מטרות ומטרות",
        target: "רווח מכירות יעד",
        target_recuriment: "רווח השימושים החדשים היעד",
        destination: "יעד הזמנות חדשות",
        target_view_page: "יעד צפיות בדף",
        target_progress_view_page: "יעד התקדמות במיקומים ב-Google",
        target_page_view_page: "יעד צפיות בדף",
        target_new_view_page: "מוצרים חדשים יעד",
        target_increase_view_page: "יעד להגברת מספר הפריטים בממוצע להזמנה (%)",
        goal_view_page: "מטרת הגברת הרווח הממוצע מההזמנה",
        update_btn_last: "עדכון",
      },
      delete_popoup: {
        text: "האם אתה בטוח שברצונך למחוק את הקטגוריה?",
        delete: "מחק",
        cancel: "ביטול",
      },
    },
  },
};

var currentLang = getCookie("current_lang");

// Initial language
let currentLanguage = currentLang;

// document.getElementById("switchBtn").innerHTML=currentLanguage;

// Function to update text content based on language
function updateContent(language) {
  // document
  //   .getElementById("switchBtn")
  //   .addEventListener("click", switchLanguage);

  const content = document.getElementById("content");
  const elementsToUpdate = content.querySelectorAll("[data-i18n]");

  elementsToUpdate.forEach((element) => {
    const key = element.getAttribute("data-i18n");
    const keys = key.split(".");
    let translation = translations[language];

    keys.forEach((k) => {
      translation = translation[k];
    });

    if (translation) {
      element.textContent = translation;
    }
  });
}
// Function to handle language switching
function switchLanguage(lang) {
  currentLanguage = lang;
  // document.getElementById("switchBtn").innerHTML=currentLanguage;
  console.log(currentLanguage);
  // const languageIcon = document.getElementById("languageIcon");
  // if (currentLanguage === "he") {
  //   languageIcon.src = "/assets/dist/img/uk.png"; // Set English flag image source
  //   languageIcon.alt = "English Flag"; // Set alt text
  // } else {
  //   languageIcon.src = "/assets/dist/img/israel.png"; // Set Hebrew flag image source
  //   languageIcon.alt = "Hebrew Flag"; // Set alt text
  // }
  let myElement = document.getElementById("myDiv");
  if (currentLanguage === "he") {
    myElement.classList.add("rtl");
  } else {
    myElement.classList.remove("rtl");
  }
  updateContent(currentLanguage);
  setPageName();
}
// Initial content update

function getCookie(name) {
  let cookieArr = document.cookie.split(";"); // Split the cookies string into individual cookie strings

  for (let i = 0; i < cookieArr.length; i++) {
    let cookiePair = cookieArr[i].split("="); // Split each cookie into a key-value pair

    // Remove whitespace at the beginning of the cookie name and compare it with the given name
    if (name == cookiePair[0].trim()) {
      return decodeURIComponent(cookiePair[1]); // Return the cookie value
    }
  }

  // Return null if not found
  return null;
}
if (currentLang === "he") {
  document.getElementById("lang-select").value = "he";
} else {
  document.getElementById("lang-select").value = "en";
}
// Example usage
console.log(currentLang);
switchLanguage(currentLang);
updateContent(currentLang);

// Event listener for language switch button
