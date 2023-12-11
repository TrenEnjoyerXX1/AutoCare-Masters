create table customer
(
    F_Name   varchar(15)  not null,
    L_Name   varchar(15)  not null,
    UserName varchar(20)  not null,
    Email    varchar(50)  not null,
    Password varchar(100) not null,
    C_ID     int auto_increment
        primary key,
    constraint U_Name
        unique (UserName),
    constraint UserName
        unique (UserName, Email)
);

create table department
(
    D_No   int auto_increment
        primary key,
    D_Name varchar(20) not null
);

create table department_locations
(
    L_ID     int auto_increment
        primary key,
    L_D_No   int         not null,
    Location varchar(50) not null,
    constraint fk_L_D_No
        foreign key (L_D_No) references department (D_No)
);

create table staff
(
    F_Name   varchar(15)  not null,
    L_Name   varchar(15)  not null,
    UserName varchar(20)  not null,
    Email    varchar(50)  not null,
    Password varchar(100) not null,
    Role     varchar(15)  not null,
    S_ID     int auto_increment
        primary key,
    S_D_No   int          not null,
    constraint Email
        unique (Email),
    constraint fk_S_D_No
        foreign key (S_D_No) references department_locations (L_ID)
);

create table vehicle
(
    Plates varchar(7) collate utf8mb4_unicode_ci not null,
    Brand  varchar(25)                           not null,
    Model  varchar(25)                           not null,
    Year   int(4)                                not null,
    Type   varchar(10)                           not null,
    C_C_ID int                                   not null,
    V_ID   int auto_increment
        primary key,
    constraint Plates
        unique (Plates),
    constraint fk_Customer_Id
        foreign key (C_C_ID) references customer (C_ID)
);

create table request
(
    R_ID            int auto_increment
        primary key,
    R_C_ID          int          not null,
    R_D_No          int          not null,
    R_S_ID          int          not null,
    R_V_ID          int          not null,
    Service_Details varchar(255) not null,
    Date            varchar(20)  not null,
    Status          varchar(10)  not null,
    Price           int          not null,
    constraint fk_R_C_Id
        foreign key (R_C_ID) references customer (C_ID),
    constraint fk_R_DL_Id
        foreign key (R_D_No) references department_locations (L_ID),
    constraint fk_R_S_Id
        foreign key (R_S_ID) references staff (S_ID),
    constraint fk_Vehicle_id
        foreign key (R_V_ID) references vehicle (V_ID),
    constraint fk_R_V_Id
        foreign key (R_V_ID) references vehicle (V_ID)
);

