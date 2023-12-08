create database Gestion_GYM;
use Gestion_GYM;

create table client (

    Id_Client int auto_increment primary key,
    Prenom_Client varchar(30) not null,
    Nom_Client varchar(30) not null,
    Date_inscription Date not null
    );
    
create table Paiement(
	Num_Paiement int auto_increment primary key,
    Date_Paiement date not null ,
    Date_DebutPaiement date not null,
    Date_FinPaiement date not null,
    Prix_Paiement int not null,
    Id_Client int not null,
    foreign key (Id_Client) references Client (Id_Client)
	);

-- create table Admin (
-- Id int auto_increment primary key,
-- Nom varchar(30) not null,	
-- Prenom varchar(30) not null ,
-- Email varchar(50)not null,
-- Password varchar(20) not null );
 
 
 CREATE TABLE Admin (
    Login varchar(60) primary key,
    MotPass varchar(150) not null
);
insert into Admin values("Admin","Admin1") ;
insert into Admin values("Houssain","Houssain1") ;
insert into Admin values("Jamal","Jamal1") ;

update Admin set MotPass = "$2y$10$l87AC.2OJGKZR4uKgeyMReo0o3l3Bju8m1A2oR0tTH/ODoftX8cHO" where MotPass = "Admin1";
update Admin set MotPass = "$2y$10$mPtyo/i8MfjmRIlVYDwSFu7pYHfPJ3uf/QD/9f9Gv/X5d/N8iyvIC" where MotPass = "Houssain1";
update Admin set MotPass = "$2y$10$/Zl3NRSUNTOzi.lSIG8C5.UCUM1g5arpEG598o0ZRYH7LJaFbbznC" where MotPass = "Jamal1";


-- insert into Admin values("Admin2","Admin") ;
 
 
-- 	INSERT INTO client VALUES (DEFAULT,'yassine','ameziane',now());

-- 	DELIMITER //
-- 	CREATE PROCEDURE sp_AddClient(Nom_Client varchar(30),Prenom_Client varchar(30))
-- 	BEGIN
-- 			INSERT INTO client VALUES (DEFAULT,Prenom_Client,Nom_Client,now());
-- 	end //
-- 	DELIMITER;
-- 	call sp_AddClient('ounasser','hamid');
-- ---------------------------------------------------------------------------
delimiter $
CREATE PROCEDURE sp_AddPaiement(Date_DebutPaiement date,Date_FinPaiement date, Prix_Paiement int,Id_Client int)
BEGIN
		
		INSERT INTO paiement (Date_Paiement,Date_DebutPaiement ,Date_FinPaiement , Prix_Paiement ,Id_Client) VALUES (now(),Date_DebutPaiement,Date_FinPaiement,Prix_Paiement,Id_Client) ;
end $
delimiter ;
-- call sp_AddPaiement('2023-04-02', '2023-10-31', '600', '14');



--    ----------------------------------------------------------------------------   
DELIMITER $$
CREATE PROCEDURE  sp_allPaiment()
BEGIN
         SELECT C.Nom_Client,C.Prenom_Client,P.Date_Paiement,P.Date_DebutPaiement ,P.Date_FinPaiement , P.Prix_Paiement FROM Client C 
         inner join paiement P using(Id_Client) group by(Id_Client) order by (Num_Paiement) asc  ;
end $$
DELIMITER;
call sp_allPaiment();
-- drop procedure sp_testPaiment;
DELIMITER $$
create  procedure sp_testPaiment(id int)
begin
SELECT C.Nom_Client,C.Prenom_Client,P.Date_Paiement,P.Date_DebutPaiement ,P.Date_FinPaiement , P.Prix_Paiement FROM Client C 
         inner join paiement P using(Id_Client)  order by Num_Paiement desc ;
end $$
delimiter;
-- call sp_testPaiment(4);


-- 	DELIMITER //
-- 	CREATE PROCEDURE  sp_allClients()
-- 	BEGIN
-- 			 SELECT * FROM `client` ;
-- 	end //
-- 	DELIMITER;


-- 	DELIMITER $$
-- 	CREATE TRIGGER tr_befor_insert_client BEFORE INSERT ON `client` FOR EACH ROW begin 
-- 	if new.Prenom_Client in (select Prenom_Client from client)
-- 	and new.Nom_Client in (select Nom_Client from client) then
-- 			SIGNAL sqlstate '45000' set MESSAGE_TEXT='Le client est deja existe';
-- 	end if;
-- 	end$$
-- 	DELIMITER;

-- 	DELIMITER $$
-- 	create PROCEDURE SP_UpdateClient(Prenom_Client varchar(30),Nom_Client varchar(30),Id_Client int)
-- 	begin
-- 	UPDATE client SET Prenom_Client=Prenom_Client,Nom_Client = Nom_Client WHERE Id_Client=Id_Client;
-- 	end $$
-- 	DELIMITER;


-- 	DELIMITER $$
-- 	CREATE TRIGGER tr_befor_update_client BEFORE update ON client 
-- 	FOR EACH ROW
-- 	begin 
-- if new.Prenom_Client in (select Prenom_Client from client)
-- 	and new.Nom_Client in (select Nom_Client from client) then
-- 			SIGNAL sqlstate '45000' set MESSAGE_TEXT='Le client est deja existe';
-- 	end if;
-- 	end$$
-- 	delimiter ;

-- 	--------------------------------------------------------------------------------------------
-- 	DELIMITER //
-- 	CREATE  TRIGGER paiement_dates_incohérentes
-- 	BEFORE INSERT ON Paiement
-- 	FOR EACH ROW
-- 	BEGIN
-- 	   DECLARE derniere_date_fin date;
-- 	 SELECT MAX(Date_FinPaiement) INTO derniere_date_fin FROM Paiement WHERE Id_Client = NEW.Id_Client;
-- 	    IF (NEW.Date_DebutPaiement < derniere_date_fin) THEN
-- 	     SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La nouvelle date de début de paiement est antérieure à la dernière date de fin de paiement signalée.';
-- 	  END IF;
-- 	END //
-- 	DELIMITER ;



-- drop procedure P1
-- 	delimiter $
-- 	create procedure P1()
-- 	begin
-- 		declare fin boolean default false;
-- 		declare nom,prenom varchar(100);
-- 		declare id int;
-- 		declare DateP ,DateDebutP , DateFinP date;
-- 		declare Prix float;
-- 		declare cur_SP cursor for select Id_Client,Prenom_Client,Nom_Client from Client;
-- 		declare continue handler for NOT FOUND set fin=true;
-- 		create table Test(
-- 		id int,
-- 		Nom varchar(100),
-- 		Prenom varchar(100),
-- 		DatePaiement Date,
-- 		DateDebutPaiement date,
-- 		DateFinPaiement date,
-- 		Prix float
-- 		);
-- 		open cur_SP;
-- 		lecture:loop
-- 			fetch cur_SP into id,nom,prenom; 
-- 			if fin=true then
-- 				leave lecture;
-- 			end if;
-- 			select Date_Paiement,Date_DebutPaiement,Date_FinPaiement,Prix_Paiement into DateP ,DateDebutP , DateFinP,Prix
-- 			from Paiement where Id_Client = id order by Num_Paiement desc limit 1;
-- 			insert into Test values(id,nom,prenom,DateP,DateDebutP,DateFinP,Prix);
-- 		end loop lecture;
-- 		close cur_SP;
-- 		select * from Test order by (DateFinPaiement)asc;
-- 		drop table Test;
-- 	end $
-- 	delimiter ;
-- 	call P1();



delimiter //
create procedure Sp_PaiementById(id int)
begin
select * from paiement where Id_Client = id order by(Date_Paiement)desc;
end //
delimiter ;
-- call Sp_PaiementById(8);


delimiter // 
CREATE PROCEDURE SP_FindPaiement(info varchar(100))
BEGIN
	select Id_Client,Nom_Client,Prenom_Client  FROM Client  WHERE
				(Id_Client REGEXP info OR
                Nom_Client REGEXP info OR
                Prenom_Client REGEXP info 
                );
end //
delimiter ;






delimiter //
create trigger tr_before_insert_Paiement before insert on Paiement
for each row
begin
    if NEW.Date_FinPaiement < NEW.Date_DebutPaiement then
        -- Lever une Exception
        SIGNAL sqlstate '45000' set MESSAGE_TEXT='La date de paiement est superieure que la date de fin de paiement';
    end if;
end //
delimiter ;
         
       --   --------------------------------------------------------------------------------------------------------


-- delimiter //
-- create trigger trr_before_insert_Paiement before insert on Paiement
-- for each row
-- begin
--     declare last_date_debut_paiement date;
--     select max(Date_DebutPaiement) into last_date_debut_paiement from Paiement ;
--     if NEW.Date_DebutPaiement < last_date_debut_paiement then
--         SIGNAL sqlstate '45000' set MESSAGE_TEXT='La date de début paiement est inférieure à la date précédente de paiement pour ce client';
--     end if;
-- end //
-- delimiter ;

       --   --------------------------------------------------------------------------------------------------------
         
-- 	delimiter $
-- 	create procedure  P2(info varchar(200))
-- 	begin
-- 		declare fin boolean default false;
-- 		declare nom,prenom varchar(100);
-- 		declare id int;
-- 		declare DateP ,DateDebutP , DateFinP date;
-- 		declare Prix float;
-- 		
-- 		declare cur_SP cursor for select Id_Client,Prenom_Client,Nom_Client from Client where 
-- 				(   Nom_Client REGEXP info OR
-- 					Prenom_Client REGEXP info 
-- 					);

-- 		declare continue handler for NOT FOUND set fin=true;
-- 		create table Test(
-- 		id int,
-- 		Nom varchar(100),
-- 		Prenom varchar(100),
-- 		DatePaiement Date,
-- 		DateDebutPaiement date,
-- 		DateFinPaiement date,
-- 		Prix float
-- 		);
-- 		open cur_SP;
-- 		lecture:loop
-- 			fetch cur_SP into id,nom,prenom; 
-- 			if fin=true then
-- 				leave lecture;
-- 			end if;
-- 			select Date_Paiement,Date_DebutPaiement,Date_FinPaiement,Prix_Paiement into DateP ,DateDebutP , DateFinP,Prix
-- 			from Paiement where Id_Client = id order by Num_Paiement desc limit 1;
-- 			insert into Test values(id,nom,prenom,DateP,DateDebutP,DateFinP,Prix);
-- 		end loop lecture;
-- 		close cur_SP;
-- 		select * from Test order by (DateFinPaiement)asc;
-- 		drop table Test;
-- 	end $
-- 	delimiter ;
-- 	call P2('zz');


-- p2 version 2
delimiter $
create procedure  Sp_RecherechePaiement(info varchar(200))
begin
declare fin boolean default false;
    declare nom,prenom varchar(100);
    declare id int;
    declare DateP ,DateDebutP , DateFinP date;
    declare Prix float;
    
DECLARE cur_SP CURSOR FOR SELECT Id_Client, Prenom_Client, Nom_Client FROM Client WHERE 
		(   Nom_Client REGEXP info OR
            Prenom_Client REGEXP info 
        );

DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = true;
CREATE TEMPORARY TABLE Test(
    id INT,
    Nom VARCHAR(100),
    Prenom VARCHAR(100),
    DatePaiement DATE,
    DateDebutPaiement DATE,
    DateFinPaiement DATE,
    Prix FLOAT
);

OPEN cur_SP;

lecture: LOOP
    FETCH cur_SP INTO id, nom, prenom; 
    IF fin = true THEN
        LEAVE lecture;
    END IF;
    SELECT Date_Paiement, Date_DebutPaiement, Date_FinPaiement, Prix_Paiement INTO DateP, DateDebutP, DateFinP, Prix
    FROM Paiement WHERE Id_Client = id ORDER BY Num_Paiement DESC LIMIT 1;
    INSERT INTO Test VALUES(id, nom, prenom, DateP, DateDebutP, DateFinP, Prix);
END LOOP lecture;

CLOSE cur_SP;
SELECT * FROM Test ORDER BY DateFinPaiement ASC;
DROP TABLE Test;
end $
delimiter ;
-- call P22('jama');


-- delimiter $
-- create procedure P22(info varchar(200))
-- begin
-- 	select c.Id_Client, c.Nom_Client, c.Prenom_Client, p.Date_Paiement, p.Date_DebutPaiement, p.Date_FinPaiement, p.Prix_Paiement
-- 	from Client c
-- 	join Paiement p on c.Id_Client = p.Id_Client 
-- 	where c.Nom_Client REGEXP info or c.Prenom_Client REGEXP info
--     group by (Id_Client)
-- 	order by p.Date_FinPaiement asc;
-- end $
-- delimiter ;
-- call P22('ol');



-- truncate admin;


DELIMITER $
CREATE PROCEDURE Sp_GetPaiement()
BEGIN
    CREATE TEMPORARY TABLE Test (
        id INT,
        Nom VARCHAR(100),
        Prenom VARCHAR(100),
        DatePaiement DATE,
        DateDebutPaiement DATE,
        DateFinPaiement DATE,
        Prix FLOAT
    );
    INSERT INTO Test (id, Nom, Prenom, DatePaiement, DateDebutPaiement, DateFinPaiement, Prix)
    SELECT c.Id_Client, c.Nom_Client, c.Prenom_Client, p.Date_Paiement, p.Date_DebutPaiement, p.Date_FinPaiement, p.Prix_Paiement
    FROM Client c
    INNER JOIN Paiement p ON c.Id_Client = p.Id_Client
    WHERE p.Num_Paiement = (
        SELECT MAX(Num_Paiement)
        FROM Paiement p2
        WHERE p2.Id_Client = c.Id_Client
    )
    ORDER BY p.Date_FinPaiement ASC;

    SELECT * FROM Test;

    DROP TABLE Test;
END $
DELIMITER ;












-- client --------------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE TRIGGER tr_befor_insert_client BEFORE INSERT ON `client` FOR EACH ROW begin 
if new.Prenom_Client in (select Prenom_Client from client)
and new.Nom_Client in (select Nom_Client from client) then
        SIGNAL sqlstate '45000' set MESSAGE_TEXT='Le client est deja existe';
end if;
end$$




DELIMITER $$
create PROCEDURE SP_UpdateClient(Prenom_Client varchar(30),Nom_Client varchar(30),Id_Client int)
begin
UPDATE client SET Prenom_Client=Prenom_Client,Nom_Client = Nom_Client WHERE Id_Client=Id_Client;
end $$


DELIMITER $$
CREATE TRIGGER tr_befor_update_client BEFORE update ON client 
FOR EACH ROW
begin 
if new.Prenom_Client in (select Prenom_Client from client)
and new.Nom_Client in (select Nom_Client from client) then
        SIGNAL sqlstate '45000' set MESSAGE_TEXT='Le client est deja existe';
end if;
end$$

DELIMITER //
create PROCEDURE sp_AddClient(Prenom_Client varchar(30),Nom_Client varchar(30),Date_DebutPaiement Date,Date_FinPaiement Date,Prix_Paiement int)
BEGIN
		INSERT INTO client VALUES (DEFAULT,Prenom_Client,Nom_Client,now());
select max(Id_Client) into @Id_Client from Client;   
    INSERT INTO Paiement (Date_Paiement,Date_DebutPaiement,Date_FinPaiement,Prix_Paiement,Id_Client)
    VALUES (now(),Date_DebutPaiement,Date_FinPaiement,Prix_Paiement,@Id_Client);
end //


Delimiter $$
create procedure sp_AllClient()
begin
SELECT c.*,max(p.Date_FinPaiement) from client c 
INNER JOIN paiement p
USING (Id_Client)
GROUP BY(Id_Client)desc;
end $$


Delimiter $$
create procedure sp_FindClient(Find varchar(30))
begin

SELECT c.*,max(p.Date_FinPaiement) from client c 
INNER JOIN paiement p
USING (Id_Client)
GROUP BY(Id_Client)asc
HAVING(Nom_Client REGEXP Find or Prenom_Client REGEXP Find);

end $$


Delimiter $$
create procedure SP_UpdateClient(Prenom_Clien varchar (30),Nom_Clien varchar (30),Id int)
begin
UPDATE client SET Prenom_Client=Prenom_Clien,
Nom_Client = Nom_Clien 
WHERE Id_Client=Id;
end $$
-- call SP_UpdateClient('ousman','dembele',1);


-- -----------------------Home---------------------------------
delimiter $$
CREATE  PROCEDURE `sp_ClientNoActive` ()   begin
create view vw_NoActive as
SELECT c.*,max(p.Date_FinPaiement)as dateF from client c 
INNER JOIN paiement p
USING (Id_Client)
GROUP BY(Id_Client)
HAVING (dateF < now());
select count(*)as NoActive from vw_NoActive;
drop view vw_NoActive;
end $$
-- ------------------------------------------------
DELIMITER $$
CREATE  PROCEDURE `sp_DeleteClient` (`Id` INT)   BEGIN
	DELETE from client WHERE
    Id_Client = Id;
end$$
-- ------------------------------------------------

-- DELIMITER $$
-- CREATE PROCEDURE `sp_MoneyOfYear` ()   BEGIN
--        select sum(Prix_Paiement) as Total from 
--       paiement
--        WHERE year(Date_Paiement) = year(now());
--  end$$
DELIMITER //
create  PROCEDURE sp_MoneyOfYear()
BEGIN
		declare  a,b int DEFAULT 0;
		  if ( select sum(Prix_Paiement)  from paiement WHERE year(Date_Paiement) = year(now()))> 0 then
			select sum(Prix_Paiement) into a  from paiement WHERE year(Date_Paiement) = year(now());
       end if;
       if ( select sum(Prix_Paiement)  from archivepaiement WHERE year(Date_Paiement) = year(now()))> 0 then
       select sum(Prix_Paiement) into b from archivepaiement WHERE year(Date_Paiement) = year(now());
       end if ;
       select (a + b) as Total ;
end //
-- ------------------------------------------------

-- DELIMITER $$
-- CREATE   PROCEDURE `sp_thisMonth` ()   begin
--  SELECT sum(Prix_Paiement) as ThisMonth   from 
--  paiement 
--  WHERE year(Date_Paiement) = year(now() )and Month(Date_Paiement) = Month(now());

-- end$$

DELIMITER //
create PROCEDURE sp_thisMonth()
BEGIN
		declare  a,b int DEFAULT 0;
        if (SELECT sum(Prix_Paiement)  from paiement WHERE year(Date_Paiement) = year(now() )and Month(Date_Paiement) = Month(now())>0)then
		SELECT sum(Prix_Paiement) into a   from paiement WHERE year(Date_Paiement) = year(now() )and Month(Date_Paiement) = Month(now());
        end if ;
        if (SELECT sum(Prix_Paiement)  from archivepaiement WHERE year(Date_Paiement) = year(now() )and Month(Date_Paiement) = Month(now())>0)then
		SELECT sum(Prix_Paiement) into b from archivepaiement WHERE year(Date_Paiement) = year(now() )and Month(Date_Paiement) = Month(now());
        end if ;
         select (a + b) as  ThisMonth  ;
end //

-- ------------------------------------------------
DELIMITER $$
CREATE  PROCEDURE `sp_TotalClients` ()   begin 
	select count(*) as nbC from Client;
end$$
DELIMITER $$
-- ------------------------------------------------
CREATE TRIGGER `tr_before_delete_Client` BEFORE DELETE ON `client` FOR EACH ROW BEGIN
 delete from paiement WHERE Id_Client = old.Id_Client;
end
$$
DELIMITER ;
-- ------------------------------------------------
create view vw_top10 as select c.Nom_Client,c.Prenom_Client,sum(p.Prix_Paiement) as Prix
    from paiement p INNER join client c USING(Id_Client)
    group by (Id_Client)
    ORDER by (Prix) desc
    LIMIT 5
    ;
    select vw_top10 ();

-- -----------------Archive--------------------------------------------------------------------------

create table Archiveclient (
	Id  int auto_increment primary key,
    Id_Client int ,
    Prenom_Client varchar(30) not null,
    Nom_Client varchar(30) not null,
    Date_inscription Date not null,
	DateSup Date
    );
    
create table ArchivePaiement(
	Id  int auto_increment primary key,
	Num_Paiement int ,
    Date_Paiement date not null ,
    Date_DebutPaiement date not null,
    Date_FinPaiement date not null,
    Prix_Paiement int not null,
    Id_Client int not null
    
	);


Delimiter //
create trigger tr_after_delete_Paiement after delete on Paiement 
for each row 
begin 
	insert into ArchivePaiement values
	 (default,old.Num_Paiement,old.Date_Paiement,old.Date_DebutPaiement
	,old.Date_FinPaiement,old.Prix_Paiement,old.Id_Client);
end //
Delimiter ;

Delimiter //
create trigger tr_after_delete_client after delete on client 
for each row 
begin 
	insert into Archiveclient values
	 (default,old.Id_Client,old.Prenom_Client,old.Nom_Client
	,old.Date_inscription,now());
end //
Delimiter ;

Delimiter $$
create procedure sp_AllClientArchive()
begin 
 select Id_Client ,Prenom_Client,
    Nom_Client ,
    Date_inscription,
	DateSup from Archiveclient ;
end $$
Delimiter ;



Delimiter $
create procedure sp_FindClientArchive(Find varchar(30))
begin 
 select Id_Client ,Prenom_Client,
    Nom_Client ,
    Date_inscription,
	DateSup from Archiveclient
where (Nom_Client REGEXP Find 
or Prenom_Client REGEXP Find);
end $
Delimiter ;



DELIMITER //
create procedure Sp_PaiementByIdArchive(id int)
BEGIN
	select Date_Paiement,
    Date_DebutPaiement ,
    Date_FinPaiement,
    Prix_Paiement  from archivepaiement where Id_Client = id ;
end //
Delimiter ;



DELIMITER //
create trigger tr_after_delete_ArchivePaiement after delete on ArchivePaiement 
for each row 
begin 
	insert into Paiement values
	 (old.Num_Paiement,old.Date_Paiement,old.Date_DebutPaiement
	,old.Date_FinPaiement,old.Prix_Paiement,old.Id_Client);
end //
Delimiter ;


DELIMITER //
create trigger tr_after_delete_Archiveclient after delete on Archiveclient 
for each row 
begin 
	insert into client values
	 (old.Id_Client,old.Prenom_Client,old.Nom_Client
	,old.Date_inscription);
    DELETE from ArchivePaiement where Id_Client = old.Id_Client;
end //
Delimiter ;


DELIMITER //
CREATE PROCEDURE SP_ReplyClient(id int)
BEGIN
	DELETE from archiveclient where Id_Client = id ;
end //
Delimiter ;



